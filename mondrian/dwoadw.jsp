<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>

<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver"
  jdbcUrl="jdbc:mysql://localhost/dwoadw2023?user=root&password=" catalogUri="/WEB-INF/queries/FPdwo.xml">
  select
  {[Measures].[Unit Penjualan],[Measures].[Total Penjualan]}on columns,
  {([Produk].[Semua Produk],[Ekspedisi].[Semua Ekspedisi],[Alamat].[Semua Alamat])}on rows
  from
  Penjualan
</jp:mondrianQuery>

<c:set var="title01" scope="session">Mondrian OLAP Adventure Works</c:set>