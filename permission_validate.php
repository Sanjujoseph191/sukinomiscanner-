<?php

include_once("common/includes/constants.php");
include_once("common/includes/constants.php");
include_once("common/includes/mysqli_function.php");
include_once("common/includes/functions.php");
include_once("common/includes/common.php");
include_once("common/includes/admin_session.php");
include_once("common/includes/english_admin.php");


$userid = addslashes($_POST['userid']);

if (!$userid) {
      header("location:permission&errmsg=Select a User");
      exit();
}


$columns = array(
      'm1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8', 'm9', 'm10', 'm11', 'm12', 'm13', 'm14', 'm15', 'm16',
      'i1', 'i2', 'i3', 'i4', 'i5', 'i6', 'i7', 'i8', 'i9', 'i10', 'i11', 'i12', 'i13', 'i14', 'i15', 'i16', 'i17', 'i18', 'i19', 'i20', 'i21', 'i22', 'i23', 'i24', 'i25', 'i26',
      'am1', 'am2', 'am3', 'am4', 'am5', 'am6', 'am7',
      'r1', 'r2', 'r3', 'r4', 'r5', 'r6', 'r7', 'r8', 'r9', 'r10', 'r11', 'r12', 'r13', 'r14', 'r15', 'r16', 'r17', 'r18', 'r19', 'r20',
      'r21', 'r22', 'r23', 'r24', 'r25', 'r26', 'r27', 'r28', 'r29', 'r30', 'r31', 'r32', 'r33', 'r34', 'r35', 'r36', 'r37', 'r38', 'r39', 'r40', 'r41',
      'p1', 'p2', 'p3', 'p4', 'p5',
      'pr1', 'pr2',
      's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13', 's14', 's15', 's16', 's17', 's19', 's20', 's21', 's22', 's23', 's24', 's25'
);


array_walk($columns, function ($item, $key) {
      global $permission;
      $permission[$item] = isset($_POST[$item]); // no needed to take values. If checkbox checked, it will come in $_POST
});

foreach ($permission as $key => $value) {
      $update_contents[] = "$key='" . intval($value == 1) . "'";
}
$update_contents = implode(',', $update_contents);
$update_query = "INSERT INTO permission (user_id) VALUES('$userid') ON DUPLICATE KEY UPDATE " . $update_contents;
$res = mysql_query($update_query);

if (!$res) {
      $e = mysql_error();
      header("location:permission?errmsg=Update failed.&ucode={$userid}");
      exit;
}
header("location:permission?msg=Permission updated successfully&ucode={$userid}");
