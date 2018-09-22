package com.iot.app.iotapp.Repositories;

import java.util.List;

import com.iot.app.iotapp.DataLayer.Reading;

import org.springframework.data.repository.CrudRepository;

/**
 * ReadingRepository
 */
public interface ReadingRepository extends CrudRepository<Reading, Long>{

    List<Reading> findBySensorId(Long id);
}