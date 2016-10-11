<?php
namespace App\Repositories;

use App\User;
use App\available_job;
class Register {
	
	
	public function register(array $data){
		
		try{
		$register=User::create($data);
		return '1';
		
		}
		catch (\Exception $ex){
			
			return $ex;
			
		}
		
	}
	
	public function getjobtype($jobid){
		$gettype=available_job::where('id',$jobid)->select('type')->first();
		return $gettype->type;
	}
	
	
	
	
	
}