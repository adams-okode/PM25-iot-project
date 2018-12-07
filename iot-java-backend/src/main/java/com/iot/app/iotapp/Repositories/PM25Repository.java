package com.iot.app.iotapp.Repositories;

import java.util.List;

import com.iot.app.iotapp.DataLayer.PM25;

import org.springframework.data.mongodb.repository.MongoRepository;



/**
 * PM25Repository
 */
public interface PM25Repository extends MongoRepository<PM25, Long>{

    List<PM25> findByRoomId(Long id);
}