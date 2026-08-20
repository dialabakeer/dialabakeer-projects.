/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.sweetstore;

import java.io.Serializable;
import java.math.BigInteger;
import java.util.Collection;
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

/**
 *
 * @author Zain
 */
@Entity
@Table(name = "inventory")
@NamedQueries({
    @NamedQuery(name = "Inventory_1.findAll", query = "SELECT i FROM Inventory_1 i"),
    @NamedQuery(name = "Inventory_1.findByDessertid", query = "SELECT i FROM Inventory_1 i WHERE i.dessertid = :dessertid"),
    @NamedQuery(name = "Inventory_1.findByDessertname", query = "SELECT i FROM Inventory_1 i WHERE i.dessertname = :dessertname"),
    @NamedQuery(name = "Inventory_1.findByPrice", query = "SELECT i FROM Inventory_1 i WHERE i.price = :price"),
    @NamedQuery(name = "Inventory_1.findByQuantity", query = "SELECT i FROM Inventory_1 i WHERE i.quantity = :quantity"),
    @NamedQuery(name = "Inventory_1.findByStatus", query = "SELECT i FROM Inventory_1 i WHERE i.status = :status")})
public class Inventory_1 implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "dessertid")
    private Integer dessertid;
    @Basic(optional = false)
    @Column(name = "dessertname")
    private String dessertname;
    @Column(name = "price")
    private BigInteger price;
    @Column(name = "quantity")
    private Integer quantity;
    @Column(name = "status")
    private String status;
    @OneToMany(cascade = CascadeType.ALL, mappedBy = "inventory")
    private Collection<OrderedDessert> orderedDessertCollection;

    public Inventory_1() {
    }

    public Inventory_1(Integer dessertid) {
        this.dessertid = dessertid;
    }

    public Inventory_1(Integer dessertid, String dessertname) {
        this.dessertid = dessertid;
        this.dessertname = dessertname;
    }

    public Integer getDessertid() {
        return dessertid;
    }

    public void setDessertid(Integer dessertid) {
        this.dessertid = dessertid;
    }

    public String getDessertname() {
        return dessertname;
    }

    public void setDessertname(String dessertname) {
        this.dessertname = dessertname;
    }

    public BigInteger getPrice() {
        return price;
    }

    public void setPrice(BigInteger price) {
        this.price = price;
    }

    public Integer getQuantity() {
        return quantity;
    }

    public void setQuantity(Integer quantity) {
        this.quantity = quantity;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
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
        hash += (dessertid != null ? dessertid.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Inventory_1)) {
            return false;
        }
        Inventory_1 other = (Inventory_1) object;
        if ((this.dessertid == null && other.dessertid != null) || (this.dessertid != null && !this.dessertid.equals(other.dessertid))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.sweetstore.Inventory_1[ dessertid=" + dessertid + " ]";
    }
    
}
