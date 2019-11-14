package controllers;

import model.Employe;
import model.Service;
import service.EmployeDao;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

@WebServlet(name="employe",urlPatterns="/employe")
public class EmployeServlet extends HttpServlet {
    EmployeDao employeDao = new EmployeDao();
    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String action= req.getParameter("action");
        switch (action){
            case "add":
                req.setAttribute("employes",employeDao.findEmployes());
                req.setAttribute("services",employeDao.findServices());
                getServletContext().getRequestDispatcher("/WEB-INF/employe.jsp").forward(req,resp);
            break;
        }
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String action= req.getParameter("action");
        switch (action){
            case "add":

                try {

                    String matricule = req.getParameter("matricule");
                    String prenom = req.getParameter("prenom");
                    String nom = req.getParameter("nom");
                    DateTimeFormatter df= DateTimeFormatter.ofPattern("dd-MM-yyyy");
                    LocalDate Datenaiss = LocalDate.parse(req.getParameter("date"),df);
                    String tel = req.getParameter("tel");
                    int salaire = Integer.parseInt(req.getParameter("salaire"));
                    int idservice = Integer.parseInt(req.getParameter("ids"));
                    Service s = new Service();
                    s.setId(idservice);
                    Employe e = new Employe();
                    e.setNom(nom);
                    e.setMatricule(matricule);
                    e.setPrenom(prenom);
                    e.setDatenaiss(Datenaiss);
                    e.setTel(tel);
                    e.setSalaire(salaire);
                    e.setService(s);
                    employeDao.addEmploye(e);
                    resp.getWriter().println("Bonjour la classe");

                }catch (Exception ex){
                    req.setAttribute("error","erreur d'insertion");

                    ex.printStackTrace();
                }
                req.setAttribute("services",employeDao.findServices());
                getServletContext().getRequestDispatcher("/WEB-INF/employe.jsp").forward(req,resp);
                break;
        }
    }
}

