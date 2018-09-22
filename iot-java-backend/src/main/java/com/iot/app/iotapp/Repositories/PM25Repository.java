package com.iot.app.iotapp.Repositories;

import java.util.List;

import com.iot.app.iotapp.DataLayer.PM25;

import org.springframework.data.repository.CrudRepository;

/**
 * PM25Repository
 */
public interface PM25Repository extends CrudRepository<PM25, Long>{

    List<PM25> findByRoomId(Long id);
}