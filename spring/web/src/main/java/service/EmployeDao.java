package service;

import model.Employe;
import model.Service;

import java.sql.ResultSet;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.List;


public class EmployeDao {
    public List<Service> findServices(){
        List<Service> services = new ArrayList<>();
        try {
            String sql="SELECT * FROM service ";
            DatabaseHelper db= DatabaseHelper.getInstance();

            ResultSet rs = db.My_ExecuteQuery(sql);
            while (rs.next()){
                Service s = new Service();
                s.setId(rs.getInt(1));
                s.setLibelle(rs.getString(2));
                services.add(s);
             }
        }catch (Exception ex){
            ex.printStackTrace();
        }
        return services;
    }
    public void addEmploye(Employe e) throws Exception{
        try{
            String sql = "INSERT INTO employe values (null,?,?,?,?,?,?,?)";
            DatabaseHelper db = DatabaseHelper.getInstance();
            db.iniPreparedCmd(sql);
            db.getPstmt().setString(1,e.getMatricule());
            db.getPstmt().setString(2,e.getNom());
            db.getPstmt().setString(3,e.getPrenom());
            db.getPstmt().setString(4,e.getTel());
            db.getPstmt().setString(5,e.getDatenaiss().toString());
            db.getPstmt().setInt(6,e.getSalaire());
            db.getPstmt().setInt(7,e.getService().getId());
            db.My_ExecutePrepareUpdate();

        }catch (Exception ex){
            throw ex;
        }
    }
    public List<Employe> findEmployes(){
        List<Employe> employes = new ArrayList<>();
        try {
            String sql= "SELECT * FROM employe e,service s WHERE e.service=s.id";
            DatabaseHelper db = DatabaseHelper.getInstance();
            ResultSet rs = db.My_ExecuteQuery(sql);
            DateTimeFormatter df= DateTimeFormatter.ofPattern("yyyy-MM-dd");
            while (rs.next()){
                Employe em = new Employe();
                em.setId(rs.getInt(1));
                em.setMatricule(rs.getString(2));
                em.setNom(rs.getString(3));
                em.setPrenom(rs.getString(4));
                em.setTel(rs.getString(5));
                em.setDatenaiss(LocalDate.parse(rs.getString(6),df));
                em.setSalaire(rs.getInt(7));
                Service s = new Service();
                s.setId(rs.getInt(9));
                s.setLibelle(rs.getString(10));
                em.setService(s);
                employes.add(em);
            }
            rs.close();
        }catch (Exception ex){
            ex.printStackTrace();
        }
        return employes;

    }
    public Employe findEmp(int id){
        Employe employe = null;
        try {
            String sql="SELECT * FROM employe WHERE id=? ";
            DatabaseHelper db= DatabaseHelper.getInstance();
            db.iniPreparedCmd(sql);
            db.getPstmt().setInt(1,id);
            ResultSet rs = db.My_ExecutePrepareQuery();
            if(rs.next()){
                employe = new Employe(rs.getInt(1),rs.getString(2),rs.getString(3),rs.getString(4),rs.getString(5),rs.getString(6),rs.getInt(7));
            }
        }catch (Exception ex){
            ex.printStackTrace();
        }
        return employe;
    }
}