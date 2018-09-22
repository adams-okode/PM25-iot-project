package com.iot.app.iotapp.Requests;

/**
 * WallRequest
 */
public class WallRequest {

    private Long room_id;
    private Integer x1;
    private Integer y1;
    private Integer x2;
    private Integer y2;

    public WallRequest() {

    }

    public WallRequest(Long room_id, Integer x1, Integer y1, Integer x2, Integer y2) {
        super();
        this.room_id = room_id;
        this.x1 = x1;
        this.x2 = x2;
        this.y1 = y1;
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
     * @return Integer return the x1
     */
    public Integer getX1() {
        return x1;
    }

    /**
     * @param x1 the x1 to set
     */
    public void setX1(Integer x1) {
        this.x1 = x1;
    }

    /**
     * @return Integer return the y1
     */
    public Integer getY1() {
        return y1;
    }

    /**
     * @param y1 the y1 to set
     */
    public void setY1(Integer y1) {
        this.y1 = y1;
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