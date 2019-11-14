package sn.sn.metier;

import sn.sn.entities.Employe;

import java.util.List;

public interface IEmploye {
    public  int add(Employe e);
    public List<Employe> list();
    public int update (Employe e);
    public  int delete (Employe e);
    public List<Employe>  findEmpService(String e);
}
