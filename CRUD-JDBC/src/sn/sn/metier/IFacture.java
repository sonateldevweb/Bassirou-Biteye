package sn.sn.metier;

import sn.sn.entities.Facture;

import java.util.List;

public interface IFacture {
    public  int add(Facture f);
    public List<Facture> list();
    public int update (Facture f);
}
