<?php

namespace App;

class Controller{
    public function getMinMaxTotalSalaryDepartments(array $departments): string
    {
        $minSumDep[] = $departments[0];
        $maxSumDep[] = $departments[0];
        foreach ($departments as $department) {
            if($department->salarySum() < $minSumDep[0]->salarySum()){
                $minSumDep[0] = $department;
            }
            if($department->salarySum() > $maxSumDep[0]->salarySum()){
                $maxSumDep[0] = $department;
            }
        }
        foreach ($departments as $department) {
            if($department->salarySum() == $minSumDep[0]->salarySum()){
                if(count($department->getStaff()) > count($minSumDep[0]->getStaff())){
                    $minSumDep[0] = $department;
                }
            }
            if($department->salarySum() == $maxSumDep[0]->salarySum()){
                if(count($department->getStaff()) > count($maxSumDep[0]->getStaff())){
                    $maxSumDep[0] = $department;
                }
            }
        } 
        foreach ($departments as $department) {
            if($department->salarySum() == $minSumDep[0]->salarySum()){
                if(count($department->getStaff()) == count($minSumDep[0]->getStaff())){
                    if(!in_array($department, $minSumDep)){
                        $minSumDep[] = $department;
                    }
                }
            }
            if($department->salarySum() == $maxSumDep[0]->salarySum()){
                if(count($department->getStaff()) == count($maxSumDep[0]->getStaff())){
                    if(!in_array($department, $maxSumDep)){
                        $maxSumDep[] = $department;
                    }
                }
            }
        }
        $result = "Min total salary departments";
        foreach ($minSumDep as $dep) {
            $result = $result."<br>".$dep->getName();
        }   
        $result = $result."<br>Max total salary departments"; 
        foreach ($maxSumDep as $dep) {
            $result = $result."<br>".$dep->getName();
        } 
        $result = $result."<br>";
        return $result;  
    }
}