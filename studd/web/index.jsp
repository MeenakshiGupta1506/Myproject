<%-- 
    Document   : index
    Created on : 29 Mar, 2020, 10:56:45 PM
    Author     : ADMIN
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*" %>
<%
    if(request.getParameter("submit")!=null)
    {
        String name = request.getParameter("sname");
        String course = request.getParameter("course");
        String fee = request.getParameter("fee");
        Connection conn;
        PreparedStatement pst;
        ResultSet rs;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost/school", "root", "");
        pst =conn.prepareStatement("insert into records(stdname,course,fee) values(?,?,?)");
        pst.setString(1, name);
        pst.setString(2, course);
        pst.setString(3, fee);
        pst.executeUpdate();
%>
        
<script>
    alert("Record Added!!!");
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
        <h1>Student Registration System Crud using-JSP</h1>
        </br>
        <div class="row">
            <div class="col-sm-4">
                <form method="POST" action="#">
                    <div align="left">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" placeholder="Student Name" name="sname" id="sname" required >
                    </div>
                    <div align="left">
                        <label class="form-label">Course</label>
                        <input type="text" class="form-control" placeholder="Course" name="course" id="course" required >
                    </div>
                    <div align="left">
                        <label class="form-label">Fee</label>
                        <input type="text" class="form-control" placeholder="Fee" name="fee" id="fee" required >
                    </div>
                    </br>
                    <div align="right">
                        <input type="submit" id="submit" value="submit" name="submit" class="btn btn-info">
                           <input type="reset" id="reset" value="reset" name="reset" class="btn btn-warning">
                    </div>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="panel-body">
                    <table id="tb1-student" class="table table-responsive table-bordered" cellpadding ="0" width ="100%">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Fee</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <%
        Connection conn;
        PreparedStatement pst;
        ResultSet rs;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost/school", "root", "");
        String query = "select * from records";
        Statement st = conn.createStatement();
        rs =st.executeQuery(query);
        while(rs.next()){
            String id = rs.getString("id");
        
                             %>
                            <tr>
                                <td><%=rs.getString("stdname") %></td>
                                <td><%=rs.getString("course") %></td>
                                <td><%=rs.getString("fee") %></td>
                                <td><a href="update.jsp?id=<%=id%>">Edit</a></td>
                                <td><a href="delete.jsp?id=<%=id%>">Delete</a></td>
                            </tr>
                            <%
        }
                            %>
                    </table>
                </div>   
            </div>
        </div>
    </body>
</html>
