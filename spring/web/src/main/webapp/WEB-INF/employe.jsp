<%@ page language="java" contentType="text/html;chareset=UTF-8" isELIgnored="false" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="em"%>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Login Form</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
     body{background-color: #f1f1f1;}
     .bslf{
    width: 350px;
  margin: 120px auto;
  padding: 25px 20px;
  background: #3a1975;
  box-shadow: 2px 2px 4px #ab8de0;
  border-radius: 5px;
  color: #fff;
     }
     .bslf h2{
    margin-top: 0px;
  margin-bottom: 15px;
  padding-bottom: 5px;
  border-radius: 10px;
  border: 1px solid #25055f;
     }
     .bslf a{color: #783ce2;}
     .bslf a:hover{
    text-decoration: none;
      color: #03A9F4;
     }
     .bslf .checkbox-inline{padding-top: 7px;}
  </style>
</head>
<body>
  <div class="bslf">
      <form action="" method="post">
        <h2 class="text-center">add employe</h2>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="matricule" name="matricule" required="required">
        </div>
       <div class="form-group">
              <input type="text" class="form-control" placeholder="nom" name="nom" required="required">
        </div>
         <div class="form-group">
                <input type="text" class="form-control" placeholder="prenom" name="prenom" required="required">
              </div>
        <div class="form-group">
          <input type="number" class="form-control" placeholder="tel" name="tel" required="required">
        </div>
           <div class="form-group">
         <input type="text" class="form-control" placeholder="Date" required="required" name="date">
           </div>
        <div class="form-group">
          <input type="number" class="form-control" placeholder="salaire" name="salaire" required="required">
         </div>
        <div class="form-group">
          <label for="sel1">Selectionner le service
          :</label>
          <select class="form-control" name="ids" id="sel1">
           <c:forEach items="${services}" var="s">
            <option value="${s.id}">${s.libelle}</option>
           </c:forEach>

          </select>
        </div>
        <div class="form-group clearfix">
          <button type="submit" class="btn btn-primary pull-right"> add</button>
        </div>

      </form>
    ${requestScope.error}
     </div>
     <table class="table">
           <tr>
               <th> Matricule </th>
               <th> Nom </th>
               <th> Téléphone </th>
               <th>  Date Naissance</th>
               <th> Salaire </th>
               <th> Service </th>
               <th> Action  </th>
           </tr>
           <c:forEach items="${employes}" var="em">
            <tr>
                       <td> ${em.matricule}  </td>
                       <td> ${em.nom}  </td>
                       <td> ${em.tel}  </td>
                       <td>  ${em.datenaiss} </td>
                       <td> ${em.salaire}    </td>
                       <td> ${em.service.libelle}  </td>
                       <td> <a href="${pageContext.request.contextPath}/employe?action=edit&id=${em.id}">update</a></td>
                   </tr>
           </c:forEach>
     </table>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
