<?php
/*@param int $lessonsNumber  общее количество уроков
@param int $currentLesson   текущий урок, для которого хотим узнать статус (доступен или не доступен к прохождению)
@param array $lessonsPassed  массив пройденных юзером тестов
@param array $lessonsBlocked   массив глобально заблокированных тестов
@return bool $isActive  результат (true/false). */

function isLessonActive($lessonsNumber, $currentLesson, $lessonsPassed, $lessonsBlocked){
		
	$isActive = in_array($currentLesson, $lessonsPassed) ||
		array_shift(array_diff(range(1, $lessonsNumber), $lessonsBlocked, $lessonsPassed)) == $currentLesson;	
	
	//Верхний код можно исопльзовать, если нужен совсем минимум кода и можно игнорировать Notice
	//А нижний удобнее читать	
	/*
	$isActive = in_array($currentLesson, $lessonsPassed);
	if(!$isActive) {
		$lessonsAll = range(1, $lessonsNumber);
		$lessonsNotPassed = array_diff($lessonsAll, $lessonsBlocked, $lessonsPassed);		
		$isActive = array_shift($lessonsNotPassed) == $currentLesson;
	}
	*/
	return $isActive;
}

