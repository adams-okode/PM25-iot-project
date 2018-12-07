package com.iot.app.iotapp.Repositories;

import com.iot.app.iotapp.DataLayer.Room;

import org.springframework.data.mongodb.repository.MongoRepository;
/**
 * RoomRepository
 */
public interface RoomRepository extends MongoRepository<Room, Long>{

	

    
}