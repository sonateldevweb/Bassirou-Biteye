package sn.sn.metier;

import sn.sn.entities.Employe;
import sn.sn.entities.Facture;

import java.sql.ResultSet;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;

public class EmployeImpl implements IEmploye {
    DB db = new DB();
    private ResultSet rs;
    private  int ok;
    @Override
    public int add(Employe e) {
        String sql ="INSERT INTO employe  VALUES(NULL,?,?,?,?,?,?,?)";
        try {
            db.initPrepar(sql);
            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
            db.getPstm().setString(1,e.getMatricule());
            db.getPstm().setString(2,e.getNom());
            db.getPstm().setString(3,e.getPrenom());
            db.getPstm().setInt(4,e.getTel());
            db.getPstm().setString(5,sdf.format(e.getDatenaiss()));
            db.getPstm().setInt(6,e.getSalaire());
            db.getPstm().setInt(7,e.getService().getId());
            ok=db.executeMaj();
            db.closeConnection();

        }catch (Exception ex){
            ex.printStackTrace();
        }
        return ok;
    }

    @Override
    public List<Employe> list() {

        List<Employe> employes= new ArrayList<>();
        String sql="SELECT * FROM employe";
        try{
            db.initPrepar(sql);
            rs=db.exexuteSelect();
            while (rs.next()){
                Employe e =new Employe();
                e.setId(rs.getInt(1));
                e.setMatricule(rs.getString(2));
                e.setNom(rs.getString(3));
                e.setPrenom(rs.getString(4));
                SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
                e.setDatenaiss(sdf.parse(rs.getString(6)));

                e.setTel(rs.getInt(5));
                e.setSalaire(rs.getInt(7));
                employes.add(e);
            }
            db.closeConnection();
            System.out.println("success");

        }catch (Exception ex){
            ex.printStackTrace();
            System.out.println("falied");
        }

        return employes;
    }


    public int update(Employe e) {
        String sql="UPDATE  employe  SET  matricule=?,nom=?,prenom=?,tel=?,salaire=?  where id=?";

        try{
            db.initPrepar(sql);
            db.getPstm().setString(1,e.getMatricule());
            db.getPstm().setString(2,e.getNom());
            db.getPstm().setString(3,e.getPrenom());
            db.getPstm().setInt(4,e.getTel());
            db.getPstm().setInt(5,e.getSalaire());
            db.getPstm().setInt(6,e.getId());
          /*
            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
          // db.getPstm().setString(5,e.getDatenaiss());

          */

            ok=db.executeMaj();
            db.closeConnection();
            System.out.println("success");

        }catch (Exception ex){
            ex.printStackTrace();
            System.out.println("failed");
        }

        return ok;
    }

    @Override
    public int delete(Employe e) {


            String sql = "DELETE FROM employe WHERE id = ?";
            int ok = 0;

            try {
                this.db.initPrepar(sql);
                this.db.getPstm().setInt(1, e.getId());
                ok = this.db.executeMaj();
                System.out.println("success");
            } catch (Exception var5) {
                var5.printStackTrace();
                System.out.println("failed");
            }

            return ok;
        }

    @Override
    public List<Employe> findEmpService(String ee) {

        List<Employe> employes= new ArrayList<>();
        String sql="SELECT * FROM employe,service WHERE employe.service = service.id  and service.libelle =  ?";
        int ok = 0;

        try {
            this.db.initPrepar(sql);
            this.db.getPstm().setString(1, ee);
            rs=db.exexuteSelect();

            while (rs.next()){
                Employe e =new Employe();

                e.setId(rs.getInt(1));
                e.setMatricule(rs.getString(2));
                e.setNom(rs.getString(3));
                e.setPrenom(rs.getString(4));
                e.setTel(rs.getInt(5));
                SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
                e.setDatenaiss(sdf.parse(rs.getString(6)));
                e.setSalaire(rs.getInt(7));

                employes.add(e);

            }

            System.out.println("success");
        } catch (Exception var5) {
            var5.printStackTrace();
            System.out.println("failed");
        }

        return employes;
    }

}
