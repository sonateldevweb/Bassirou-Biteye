package com.filrouge.tranfert.repository;

import com.filrouge.tranfert.model.Role;
import com.filrouge.tranfert.model.RoleName;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;


@Repository
public interface RoleRepository extends JpaRepository<Role, Long> {
    Optional<Role> findByName(RoleName roleName);
}
