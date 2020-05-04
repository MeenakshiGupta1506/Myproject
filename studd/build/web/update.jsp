<%-- 
    Document   : update
    Created on : 1 Apr, 2020, 12:58:46 AM
    Author     : ADMIN
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*" %>
<%
    if(request.getParameter("submit")!=null)
    {
        String id = request.getParameter("id");
        String name = request.getParameter("sname");
        String course = request.getParameter("course");
        String fee = request.getParameter("fee");
        Connection conn;
        PreparedStatement pst;
        ResultSet rs;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost/school", "root", "");
        pst =conn.prepareStatement("update records set stdname =?, course =?, fee =? where id =?");
        pst.setString(1, name);
        pst.setString(2, course);
        pst.setString(3, fee);
        pst.setString(4, id);
        pst.executeUpdate();
%>
        
<script>
    alert("Record Updated!!!");
</script>


  <%      
    }
%>      
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
         <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Student Update</h1>
        <div class="row">
             <div class="col-sm-4">
                <form method="POST" action="#">
                    <% 
        Connection conn;
        PreparedStatement pst;
        ResultSet rs;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost/school", "root", "");
        String id = request.getParameter("id");
        pst = conn.prepareStatement("select * from records where id = ?");
        pst.setString(1, id);
        rs = pst.executeQuery();
        while(rs.next()){
                    %>
                    <div align="left">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" placeholder="Student Name" value = "<%=rs.getString("stdname") %>" name="sname" id="sname" required >
                    </div>
                    <div align="left">
                        <label class="form-label">Course</label>
                        <input type="text" class="form-control" placeholder="Course" name="course" value = "<%=rs.getString("course") %>" id="course" required >
                    </div>
                    <div align="left">
                        <label class="form-label">Fee</label>
                        <input type="text" class="form-control" placeholder="Fee" name="fee" id="fee" value = "<%=rs.getString("fee") %>" required >
                    </div>
                    <%
        }
                    %>
                    </br>
                    <div align="left">
                        <input type="submit" id="submit" value="submit" name="submit" class="btn btn-info">
                           <input type="reset" id="reset" value="reset" name="reset" class="btn btn-warning">
                    </div>
                    <div align="right" >
                        <p><a href="index.jsp">Click Back</a></p>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
