/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.sweetstore;

import java.io.Serializable;
import java.math.BigInteger;
import javax.persistence.Column;
import javax.persistence.EmbeddedId;
import javax.persistence.Entity;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;

/**
 *
 * @author Zain
 */
@Entity
@Table(name = "ordered_dessert")
@NamedQueries({
    @NamedQuery(name = "OrderedDessert.findAll", query = "SELECT o FROM OrderedDessert o"),
    @NamedQuery(name = "OrderedDessert.findByOrderid", query = "SELECT o FROM OrderedDessert o WHERE o.orderedDessertPK.orderid = :orderid"),
    @NamedQuery(name = "OrderedDessert.findByDessertid", query = "SELECT o FROM OrderedDessert o WHERE o.orderedDessertPK.dessertid = :dessertid"),
    @NamedQuery(name = "OrderedDessert.findByQuantity", query = "SELECT o FROM OrderedDessert o WHERE o.quantity = :quantity"),
    @NamedQuery(name = "OrderedDessert.findByPriceatorder", query = "SELECT o FROM OrderedDessert o WHERE o.priceatorder = :priceatorder")})
public class OrderedDessert implements Serializable {

    private static final long serialVersionUID = 1L;
    @EmbeddedId
    protected OrderedDessertPK orderedDessertPK;
    @Column(name = "quantity")
    private Integer quantity;
    @Column(name = "priceatorder")
    private BigInteger priceatorder;
    @JoinColumn(name = "dessertid", referencedColumnName = "dessertid", insertable = false, updatable = false)
    @ManyToOne(optional = false)
    private Inventory_1 inventory;
    @JoinColumn(name = "orderid", referencedColumnName = "orderid", insertable = false, updatable = false)
    @ManyToOne(optional = false)
    private OrderCustomer orderCustomer;

    public OrderedDessert() {
    }

    public OrderedDessert(OrderedDessertPK orderedDessertPK) {
        this.orderedDessertPK = orderedDessertPK;
    }

    public OrderedDessert(int orderid, int dessertid) {
        this.orderedDessertPK = new OrderedDessertPK(orderid, dessertid);
    }

    public OrderedDessertPK getOrderedDessertPK() {
        return orderedDessertPK;
    }

    public void setOrderedDessertPK(OrderedDessertPK orderedDessertPK) {
        this.orderedDessertPK = orderedDessertPK;
    }

    public Integer getQuantity() {
        return quantity;
    }

    public void setQuantity(Integer quantity) {
        this.quantity = quantity;
    }

    public BigInteger getPriceatorder() {
        return priceatorder;
    }

    public void setPriceatorder(BigInteger priceatorder) {
        this.priceatorder = priceatorder;
    }

    public Inventory_1 getInventory() {
        return inventory;
    }

    public void setInventory(Inventory_1 inventory) {
        this.inventory = inventory;
    }

    public OrderCustomer getOrderCustomer() {
        return orderCustomer;
    }

    public void setOrderCustomer(OrderCustomer orderCustomer) {
        this.orderCustomer = orderCustomer;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (orderedDessertPK != null ? orderedDessertPK.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof OrderedDessert)) {
            return false;
        }
        OrderedDessert other = (OrderedDessert) object;
        if ((this.orderedDessertPK == null && other.orderedDessertPK != null) || (this.orderedDessertPK != null && !this.orderedDessertPK.equals(other.orderedDessertPK))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.sweetstore.OrderedDessert[ orderedDessertPK=" + orderedDessertPK + " ]";
    }
    
}
