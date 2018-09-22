package com.iot.app.iotapp.Requests;

/**
 * PM25Request
 */
public class PM25Request {

    private Long room_id;
    private String tag;
    private Integer x2;
    private Integer y2;

    public PM25Request() {

    }

    public PM25Request(Long room_id, String tag, Integer x2, Integer y2) {
        super();
        this.room_id = room_id;
        this.tag = tag;
        this.x2 = x2;
        this.y2 = y2;
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

}