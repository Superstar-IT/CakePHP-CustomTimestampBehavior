<?php
class CustomTimestampBehavior extends ModelBehavior {
	public function setup(Model $Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = array(
				'created' => array(
					'column' => 'created',
					'format' => 'datetime',
				),
				'updated' => array(
					'column' => 'updated',
					'format' => 'datetime',
				),
			);
		}

		foreach ($settings as $timestamp => $setting) {
			foreach ($setting as $key => $value) {
				$this->settings[$Model->alias][$timestamp][$key] = $value;
			}
		}
 	}

	function beforeSave(&$Model) {
		$timeNowUnixtime = time();
		$timeNowDatetime = date("Y-m-d H:i:s", $timeNowUnixtime);

		if (!isset($Model->data[$Model->alias][$Model->primaryKey])) {
			$Model->data[$Model->alias][$this->settings[$Model->alias]['created']['column']] =
				$this->settings[$Model->alias]['created']['format'] == 'datetime' ? $timeNowDatetime : $timeNowUnixtime;
		}
		$Model->data[$Model->alias][$this->settings[$Model->alias]['updated']['column']] =
			$this->settings[$Model->alias]['updated']['format'] == 'datetime' ? $timeNowDatetime : $timeNowUnixtime;

		return true;
	}
}
