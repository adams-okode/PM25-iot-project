package com.iot.app.iotapp.DataLayer;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

@Entity
@Table(name = "sensors")
public class PM25 {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private Long room_id;
    private String tag;
    private Integer x2;
    private Integer y2;
    @OneToMany
    private List<Reading> reading;
    public PM25() {

    }

    public PM25(Long room_id, String tag, Integer x2, Integer y2) {
        super();
        this.room_id = room_id;
        this.tag = tag;
        this.x2 = x2;
        this.y2 = y2;

    }

    /**
     * @return Long return the id
     */
    public Long getId() {
        return id;
    }

    /**
     * @param id the id to set
     */
    public void setId(Long id) {
        this.id = id;
    }

    /**
     * @return Long return the room_id
     */
    public Long getRoom_id() {
        return room_id;
    }

    /**
     * @param room_id the room_id to set
     */
    public void setRoom_id(Long room_id) {
        this.room_id = room_id;
    }

    /**
     * @return String return the tag
     */
    public String getTag() {
        return tag;
    }

    /**
     * @param tag the tag to set
     */
    public void setTag(String tag) {
        this.tag = tag;
    }

    /**
     * @return Integer return the x2
     */
    public Integer getX2() {
        return x2;
    }

    /**
     * @param x2 the x2 to set
     */
    public void setX2(Integer x2) {
        this.x2 = x2;
    }

    /**
     * @return Integer return the y2
     */
    public Integer getY2() {
        return y2;
    }

    /**
     * @param y2 the y2 to set
     */
    public void setY2(Integer y2) {
        this.y2 = y2;
    }


    /**
     * @return List<Reading> return the reading_id
     */
    public List<Reading> getReading() {
        return reading;
    }

    /**
     * @param reading_id the reading_id to set
     */
    public void setReading_id(List<Reading> reading) {
        this.reading = reading;
    }

}