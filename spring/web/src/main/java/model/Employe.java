package model;


import java.time.LocalDate;
import java.util.Date;
import java.util.Locale;

public class Employe {
    private int id;
    private String matricule;
    private String nom;
    private String prenom;
    private String tel;
    private LocalDate datenaiss;
    private int salaire;
    private Service service;

    public Employe() {
    }

    public Employe(int id, String matricule, String nom, String prenom, String tel, LocalDate datenaiss, int salaire, Service service) {
        this.id = id;
        this.matricule = matricule;
        this.nom = nom;
        this.prenom = prenom;
        this.tel = tel;
        this.datenaiss = datenaiss;
        this.salaire = salaire;
        this.service = service;
    }

    public int getId() {
        return id;
    }

    public String getTel() {
        return tel;
    }

    public void setTel(String tel) {
        this.tel = tel;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getMatricule() {
        return matricule;
    }

    public void setMatricule(String matricule) {
        this.matricule = matricule;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }



    public LocalDate getDatenaiss() {
        return datenaiss;
    }

    public void setDatenaiss(LocalDate datenaiss) {
        this.datenaiss = datenaiss;
    }

    public int getSalaire() {
        return salaire;
    }

    public void setSalaire(int salaire) {
        this.salaire = salaire;
    }

    public Service getService() {
        return service;
    }

    public void setService(Service service) {
        this.service = service;
    }
}

