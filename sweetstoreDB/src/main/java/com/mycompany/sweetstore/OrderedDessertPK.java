/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.sweetstore;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Embeddable;

/**
 *
 * @author Zain
 */
@Embeddable
public class OrderedDessertPK implements Serializable {

    @Basic(optional = false)
    @Column(name = "orderid")
    private int orderid;
    @Basic(optional = false)
    @Column(name = "dessertid")
    private int dessertid;

    public OrderedDessertPK() {
    }

    public OrderedDessertPK(int orderid, int dessertid) {
        this.orderid = orderid;
        this.dessertid = dessertid;
    }
  public OrderedDessertPK(int dessertid) {
      
        this.dessertid = dessertid;
    }
    public int getOrderid() {
        return orderid;
    }

    public void setOrderid(int orderid) {
        this.orderid = orderid;
    }

    public int getDessertid() {
        return dessertid;
    }

    public void setDessertid(int dessertid) {
        this.dessertid = dessertid;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (int) orderid;
        hash += (int) dessertid;
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof OrderedDessertPK)) {
            return false;
        }
        OrderedDessertPK other = (OrderedDessertPK) object;
        if (this.orderid != other.orderid) {
            return false;
        }
        if (this.dessertid != other.dessertid) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.sweetstore.OrderedDessertPK[ orderid=" + orderid + ", dessertid=" + dessertid + " ]";
    }
    
}
