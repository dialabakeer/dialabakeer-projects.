/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.sweetstore;

import java.io.Serializable;
import java.math.BigInteger;
import java.util.Collection;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

/**
 *
 * @author Zain
 */
@Entity
@Table(name = "order_customer")
@NamedQueries({
    @NamedQuery(name = "OrderCustomer.findAll", query = "SELECT o FROM OrderCustomer o"),
    @NamedQuery(name = "OrderCustomer.findByOrderid", query = "SELECT o FROM OrderCustomer o WHERE o.orderid = :orderid"),
    @NamedQuery(name = "OrderCustomer.findByDate", query = "SELECT o FROM OrderCustomer o WHERE o.date = :date"),
    @NamedQuery(name = "OrderCustomer.findByCustomerid", query = "SELECT o FROM OrderCustomer o WHERE o.customerid = :customerid"),
    @NamedQuery(name = "OrderCustomer.findByCustomername", query = "SELECT o FROM OrderCustomer o WHERE o.customername = :customername"),
    @NamedQuery(name = "OrderCustomer.findByPhonenumber", query = "SELECT o FROM OrderCustomer o WHERE o.phonenumber = :phonenumber"),
    @NamedQuery(name = "OrderCustomer.findByTotalprice", query = "SELECT o FROM OrderCustomer o WHERE o.totalprice = :totalprice")})
public class OrderCustomer implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "orderid")
    private Integer orderid;
    @Column(name = "date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date date;
    @Basic(optional = false)
    @Column(name = "customerid")
    private int customerid;
    @Column(name = "customername")
    private String customername;
    @Column(name = "phonenumber")
    private String phonenumber;
    @Column(name = "totalprice")
    private BigInteger totalprice;
    @OneToMany(mappedBy = "orderId")
    private Collection<Payment> paymentCollection;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "orderCustomer")
    private Collection<OrderedDessert> orderedDessertCollection;

    public OrderCustomer() {
    }

    public OrderCustomer(Integer orderid) {
        this.orderid = orderid;
    }

    public OrderCustomer(Integer orderid, int customerid) {
        this.orderid = orderid;
        this.customerid = customerid;
    }

    public Integer getOrderid() {
        return orderid;
    }

    public void setOrderid(Integer orderid) {
        this.orderid = orderid;
    }

    public Date getDate() {
        return date;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    public int getCustomerid() {
        return customerid;
    }

    public void setCustomerid(int customerid) {
        this.customerid = customerid;
    }

    public String getCustomername() {
        return customername;
    }

    public void setCustomername(String customername) {
        this.customername = customername;
    }

    public String getPhonenumber() {
        return phonenumber;
    }

    public void setPhonenumber(String phonenumber) {
        this.phonenumber = phonenumber;
    }

    public BigInteger getTotalprice() {
        return totalprice;
    }

    public void setTotalprice(BigInteger totalprice) {
        this.totalprice = totalprice;
    }

    public Collection<Payment> getPaymentCollection() {
        return paymentCollection;
    }

    public void setPaymentCollection(Collection<Payment> paymentCollection) {
        this.paymentCollection = paymentCollection;
    }

    public Collection<OrderedDessert> getOrderedDessertCollection() {
        return orderedDessertCollection;
    }

    public void setOrderedDessertCollection(Collection<OrderedDessert> orderedDessertCollection) {
        this.orderedDessertCollection = orderedDessertCollection;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (orderid != null ? orderid.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof OrderCustomer)) {
            return false;
        }
        OrderCustomer other = (OrderCustomer) object;
        if ((this.orderid == null && other.orderid != null) || (this.orderid != null && !this.orderid.equals(other.orderid))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.sweetstore.OrderCustomer[ orderid=" + orderid + " ]";
    }
    
}
