package com.iot.app.iotapp.Repositories;

import java.util.List;

import com.iot.app.iotapp.DataLayer.Wall;

import org.springframework.data.mongodb.repository.MongoRepository;

/**
 * WallRepository
 */
public interface WallRepository extends MongoRepository<Wall, Long>{
    List<Wall> findByRoomId(Long id);
}