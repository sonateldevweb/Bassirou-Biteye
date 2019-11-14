package sn.sn;

import jdk.dynalink.linker.LinkerServices;
import sn.sn.entities.Employe;
import sn.sn.entities.Facture;
import sn.sn.entities.Reglement;
import sn.sn.entities.Service;
import sn.sn.metier.*;

import java.sql.Array;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;
public class Main {

           public static void main(String[] args) throws ParseException {
               Scanner Scanner=new Scanner(System.in);
               IEmploye iEmploye = new EmployeImpl();
               Employe e = new Employe();
               SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
               Service s = new Service();
               System.out.println("=============menu================");
               System.out.println("==========1 add employe==========");
               System.out.println("==========2 update employe========");
               System.out.println("==========3 delete employe========");
               System.out.println("==========4 lister employer=======");
               System.out.println("==========5 lister employer/service===");

              System.out.println("Donnez votre reponse ?");
                String rep = Scanner.nextLine();
                switch (rep){
                    case "1":
                        Scanner scanner = new Scanner(System.in);


               System.out.println("donner le matricule");
               e.setMatricule(scanner.nextLine());
               System.out.println("donner le nom");
               e.setNom(scanner.nextLine());
               System.out.println("donner le prenom");
               e.setPrenom(scanner.nextLine());
               System.out.println("donner le telephone");
               e.setTel(Integer.parseInt(scanner.nextLine()));
               System.out.println("donner la date de naissance");
               e.setDatenaiss(sdf.parse(scanner.nextLine()));
               System.out.println("donner le salaire");
               e.setSalaire(Integer.parseInt(scanner.nextLine()));
               System.out.println("donner l'id du service");
               s.setId(Integer.parseInt(scanner.nextLine()));

               //s.setId(2);
               e.setService(s);

                iEmploye.add(e);
                        break;
                    case "2":
                        Scanner sc = new Scanner(System.in);

                        System.out.println("donner l'id a modifier");
                        e.setId(Integer.parseInt(sc.nextLine()));
                        System.out.println("donner le matricule");
                        e.setMatricule(sc.nextLine());
                        System.out.println("donner le nom");
                        e.setNom(sc.nextLine());
                        System.out.println("donner le prenom");
                        e.setPrenom(sc.nextLine());
                        System.out.println("donner le telephone");
                        e.setTel(Integer.parseInt(sc.nextLine()));
                        System.out.println("donner la date de naissance");
                      //  e.setDatenaiss(sdf.parse(sc.nextLine()));
                        System.out.println("donner le salaire");
                        e.setSalaire(Integer.parseInt(sc.nextLine()));
                /*        System.out.println("donner l'id du service");
                        s.setId(Integer.parseInt(sc.nextLine()));
                        e.setService(s);*/
                        iEmploye.update(e);
                        break;
                    case "3":
                        Scanner sca = new Scanner(System.in);
                        System.out.println("donner l'id a modifier");
                        e.setId(Integer.parseInt(sca.nextLine()));
                        iEmploye.delete(e);
                        break;
                    case "4":
                        IEmploye ee = new EmployeImpl();
                        List<Employe> employeList = new ArrayList<>();
                        employeList = ee.list();
                       for (Employe empl:  employeList){
                           System.out.println("identification : "+ empl.getId()+" nom : "+empl.getNom()+" prenom : "
                                   +empl.getPrenom()+" telephone: "+empl.getTel()+
                                   " salaire: "+empl.getSalaire()+" datenaiss "+empl.getDatenaiss());


                       }




                        break;
                    case "5":
                        IEmploye e1 = new EmployeImpl();
                        List<Employe> empService = new ArrayList<>();
                        Scanner scan = new Scanner(System.in);
                        System.out.println("donner l'id a modifier");
                        String a;
                        a=scan.nextLine();
                        empService = e1.findEmpService(a);
                        System.out.println(e1);
                        for (Employe empl:  empService){
                            System.out.println("identification : "+ empl.getId()+" nom : "+empl.getNom()+" prenom : "
                                    +empl.getPrenom()+" telephone: "+empl.getTel()+
                                    " salaire: "+empl.getSalaire()+" datenaiss "+empl.getDatenaiss());


                        }


                        break;

                        default:
                            System.out.println("choix incoreect");

                }

           /*    Connection connection = null;
               String nom,prenom,telephone;
               Scanner sc=new Scanner(System.in);
               //Saisie de l'etudiant
               System.out.println("entrer nom");
               nom=sc.nextLine();
               System.out.println("entrer prenom");
               prenom=sc.nextLine();
               System.out.println("entrer le numero");
               telephone=sc.nextLine();
                   Etudiant etudiant=new Etudiant(nom,prenom,telephone);*/

           /*
                   Facture f = new Facture();
                   SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");

                   f.setDate(sdf.parse("2019-02-27"));
                   f.setConsommation(100);
                   f.setPrix(1000);
                   f.setPaiement(false);

                   IFacture  iFacture= new FactureImpl();
                     int ok=iFacture.add(f);
                     System.out.println(ok);*/
           /*    Reglement r = new Reglement();
               SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");

               r.setDate(sdf.parse("2019-02-27"));
               Facture f = new Facture();
               f.setIdF(2);
               r.setFacture(f);
               IReglement iReglement = new ReglementImpl();
               iReglement.add(r);

               //reglement f 2
               f.setPaiement(true);
               IFacture iFacture = new FactureImpl();
               iFacture.update(f);
               System.out.println("bingo");*/


               System.out.println("bingo");


            /*    iEmploye.list();
               System.out.println(iEmploye.list());
               IEmploye iEmploye = new EmployeImpl();
*/

             /*  System.out.println("bingo");


               iEmploye.list();
               System.out.println(iEmploye);*/

           }

}