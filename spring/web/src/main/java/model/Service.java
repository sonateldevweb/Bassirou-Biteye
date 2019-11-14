package model;

import java.util.ArrayList;
import java.util.List;

public class Service {
    private int id;
    private String libelle;
    public List<Employe> getEmployes() {
        return employes;
    }

    public void setEmployes(Employe e) {
        List<Employe> employes = new ArrayList<Employe>();
        employes.add(e);
        this.employes = employes;
    }

    private List<Employe> employes = new ArrayList<Employe>();


    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getLibelle() {
        return libelle;
    }

    public void setLibelle(String libelle) {
        this.libelle = libelle;
    }
}

