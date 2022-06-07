variable "region" {
  default = "us-east-1"
}
variable "availability_zone" {
  # No spaces allowed between az names!
  default = "us-east-1a"
}
#
#Instance Variables
#

variable "instance_type" {
  default = "t2.micro"
}
variable "volume_type" {
  default = "gp3"
}
variable "volume_size" {
  default = "30"
}
# Amazon Linux AMI
# 
variable "ami" {
  default = "ami-0747bdcabd34c712a"
  }
variable "vpc_cidr" {
  description = "CIDR for the whole VPC"
  default = "10.0.0.0/16"
}
variable "public_subnet_cidr" {
  description = "CIDR for the Public Subnet"
  default = "10.0.0.0/24"
}
#
#Variables for Instance Tagging
#
variable "projectTag" {
  default = "IntroToAutomation"
}

variable "departmentTag" {
  default = "Lab"
}

variable "environmentTag" {
  default = "test"
}
