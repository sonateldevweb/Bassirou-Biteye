package com.devweb.rh.repository;

import com.devweb.rh.model.Employe;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;


@Repository
public interface EmployeRepository extends JpaRepository<Employe, Integer> {

}