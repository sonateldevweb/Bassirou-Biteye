package com.company;

public class orangeMoneyStrategy implements PaiementStrategy{
    private String telephone;
    private String code;

    public orangeMoneyStrategy(String telephone, String code) {
        this.telephone = telephone;
        this.code = code;
    }

    @Override
    public void payer(int montant) {
        System.out.println(montant + " fcfa payés par Orange Money.");

    }
}
