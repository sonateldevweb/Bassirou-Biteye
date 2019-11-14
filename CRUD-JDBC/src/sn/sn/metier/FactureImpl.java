package sn.sn.metier;


import sn.sn.entities.Facture;

import java.sql.ResultSet;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;

public class FactureImpl implements  IFacture{
    DB db = new DB();
    private ResultSet rs;
    private  int ok;
    @Override
    public int add(Facture f) {
        String sql ="INSERT INTO facture  VALUES(NULL,?,?,?,?)";
        try {
            db.initPrepar(sql);
            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");

            db.getPstm().setString(1,sdf.format(f.getDate()));
            db.getPstm().setInt(2,f.getConsommation());
            db.getPstm().setInt(3,f.getPrix());
            db.getPstm().setBoolean(4,f.isPaiement());
            ok=db.executeMaj();
            db.closeConnection();

        }catch (Exception ex){
            ex.printStackTrace();
        }
        return ok;
    }

    @Override
    public List<Facture> list() {
        List<Facture> factures= new ArrayList<>();
        String sql="SELECT * FROM facture";
        try{
            db.initPrepar(sql);
        rs=db.exexuteSelect();
            while (rs.next()){
                Facture f =new Facture();
                f.setIdF(rs.getInt(1));
                SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
                f.setDate(sdf.parse(rs.getString(2)));
                f.setConsommation(rs.getInt(3));
                f.setPrix(rs.getInt(4));
                f.setPaiement(rs.getBoolean(4));
                factures.add(f);
            }
            db.closeConnection();

        }catch (Exception ex){
            ex.printStackTrace();
        }

        return factures;
    }

    @Override
    public int update(Facture f) {
        String sql ="UPDATE  facture  SET paiement= ? where idF=?";
        try {
            db.initPrepar(sql);
            db.getPstm().setBoolean(1,f.isPaiement());
            db.getPstm().setInt(2,f.getIdF());

            ok=db.executeMaj();
            db.closeConnection();
        }catch (Exception ex){
            ex.printStackTrace();
        }
        return ok;
 }
}
