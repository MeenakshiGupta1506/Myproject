<%@page import="java.sql.*" %>
<%
        String id = request.getParameter("id");
        Connection conn;
        PreparedStatement pst;
        ResultSet rs;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://localhost/school", "root", "");
        pst =conn.prepareStatement("delete from records where id =?");
        pst.setString(1, id);
        pst.executeUpdate();
%>
        
<script>
    alert("Record Deleted!!!");
</script> 