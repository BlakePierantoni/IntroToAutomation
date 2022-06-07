#
#From Main
#
variable "region" {}
variable "instance_type" {}
variable "volume_type" {}
variable "volume_size" {}
variable "ami" {}
variable "projectTag" {}
variable "departmentTag" {}
variable "environmentTag" {}
#
# From other modules
#
variable "public_subnet_id" {}
variable "onPremWebSG" {}
variable "onPremDBSG" {}
