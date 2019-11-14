package com.company;

public class Main {

    public static void main(String[] args) {
	// paiement par Orange Money
        Produit p = new Produit("iphone 11",1000000);
        p.payer(new orangeMoneyStrategy("771523139","xxxx"));
        // paiement par Orange Money
        Produit p2 = new Produit("iphone 6",60000);
        p2.payer(new paypalStrategy("bassbiteye45@gmail.com","xxxx"));
    }
}
