package com.iot.app.iotapp.Model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "customSequences")
public class CustomSequences {
    @Id
    private String id;
    private Long seq;

    /**
     * @return String return the id
     */
    public String getId() {
        return id;
    }

    /**
     * @param id the id to set
     */
    public void setId(String id) {
        this.id = id;
    }

    /**
     * @return Long return the seq
     */
    public Long getSeq() {
        return seq;
    }

    /**
     * @param seq the seq to set
     */
    public void setSeq(Long seq) {
        this.seq = seq;
    }

}