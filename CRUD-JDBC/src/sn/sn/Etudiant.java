package sn.sn;

public class Etudiant {
    private int id;
    private String nom;
    private String prenom;

    public Etudiant() {
    }

    public Etudiant( String nom, String prenom, String telephone) {

        this.nom = nom;
        this.prenom = prenom;
        this.telephone = telephone;
    }



    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
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

    public String getTelephone() {
        return telephone;
    }

    public void setTelephone(String telephone) {
        this.telephone = telephone;
    }

    private String telephone;

}


