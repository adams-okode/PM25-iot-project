package com.iot.app.iotapp.Repositories;

import java.util.List;

import com.iot.app.iotapp.DataLayer.Reading;

import org.springframework.data.mongodb.repository.MongoRepository;

/**
 * ReadingRepository
 */
public interface ReadingRepository extends MongoRepository<Reading, Long>{

    List<Reading> findBySensorId(Long id);
}