package sn.sn.metier;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

public class DB {
  //pour la connection
    private Connection cnx;
    //pour les resultats des requetes de type SELECT
    private ResultSet rs;
    //pour les requetes preparees
    private PreparedStatement pstm;
    //pour  les resultat des requetes de mise a jour MAJ(INSERT ,UPDATE, DELETE)
    private int ok;

    private void  getConnection(){
        try{
            Class.forName("com.mysql.jdbc.Driver");
            cnx = DriverManager.getConnection("jdbc:mysql://localhost:3306/test","test","test");

        }catch (Exception ex){
            ex.printStackTrace();
        }

    }
    public void initPrepar(String sql){
        try {
            getConnection();
            pstm=cnx.prepareStatement(sql);
        }catch (Exception ex){
            ex.printStackTrace();
        }
      }
      public ResultSet exexuteSelect(){
         try {
             rs=pstm.executeQuery();
         }catch (Exception ex){
             ex.printStackTrace();
         }
         return rs;
      }
      public int executeMaj(){
        try {
            ok=pstm.executeUpdate();
        }catch (Exception ex){
            ex.printStackTrace();
        }
        return ok;
      }
    public void closeConnection(){
        try {
            if (cnx!=null){
                cnx.close();
            }
        }catch (Exception ex){
            ex.printStackTrace();
        }
    }

    public PreparedStatement getPstm() {
        return pstm;
    }
}
