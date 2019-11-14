package com.company;

public class Produit {
    private String nom;
    private int prix;


    public Produit(String nom, int prix) {
        this.nom = nom;
        this.prix = prix;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public int getPrix() {
        return prix;
    }

    public void setPrix(int prix) {
        this.prix = prix;
    }

    public void payer(PaiementStrategy methode){
        int montant=this.getPrix();
        methode.payer(montant);
    }}
