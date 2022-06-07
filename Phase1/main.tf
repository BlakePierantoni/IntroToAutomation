module "site" {
  source = "./site"
  availability_zone = "${var.availability_zone}"
  vpc_cidr = "${var.vpc_cidr}"
  public_subnet_cidr = "${var.public_subnet_cidr}"
  projectTag = "${var.projectTag}"
  departmentTag = "${var.departmentTag}"
  environmentTag = "${var.environmentTag}"
}
module "instances" {
  source = "./instances"
  region = "${var.region}"
  public_subnet_id = "${module.site.public_subnet_id}"
  ami = "${var.ami}"
  instance_type = "${var.instance_type}"
  volume_type = "${var.volume_type}"
  volume_size = "${var.volume_size}"
  onPremWebSG = "${module.site.onPremWebSG}"
  onPremDBSG = "${module.site.onPremDBSG}"
  projectTag = "${var.projectTag}"
  departmentTag = "${var.departmentTag}"
  environmentTag = "${var.environmentTag}"


}
