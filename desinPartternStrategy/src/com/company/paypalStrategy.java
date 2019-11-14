package com.company;

public class paypalStrategy implements PaiementStrategy{


    private String username;
    private String password;

    public paypalStrategy(String username, String password) {
        this.username = username;
        this.password = password;
    }

    @Override
    public void payer(int montant) {
        System.out.println(montant + " fcfa payés par Paypal.");
    }
}
