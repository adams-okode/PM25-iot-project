package com.iot.app.iotapp.Services;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import com.iot.app.iotapp.DataLayer.PM25;
import com.iot.app.iotapp.DataLayer.Reading;
import com.iot.app.iotapp.Repositories.ReadingRepository;
import com.iot.app.iotapp.Requests.ReadingRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 * ReadingService
 */
@Service
public class ReadingService {
    @Autowired
    ReadingRepository readingRepository;

    @Autowired
    PM25Service pm25Service;
    
    public List<Reading> getAllReadings() {
		List<Reading> readings = new ArrayList<>();
		readingRepository.findAll().forEach(readings::add);
		return readings;
	}

	public Optional<Reading> getReading(Long id) {
		return readingRepository.findById(id);
    }
    
	public void addReading(ReadingRequest readingRequest) {
        Reading reading=new Reading();
        PM25 sensor = pm25Service.getPM25(readingRequest.getSensor_id());
        reading.setSensor(sensor);
		reading.setCreated_at(LocalDateTime.now());
		reading.setUpdated_at(LocalDateTime.now());
		reading.setValue(readingRequest.getValue());
		readingRepository.save(reading);
	}

	public void updateReading(Reading reading, Long id) {
		readingRepository.save(reading);
	}

	public void deleteReading(Long id) {
		readingRepository.deleteById(id);
    }
    
    public List<Reading> getAllSensorReadings(Long id){
        return readingRepository.findBySensorId(id);
    }
}