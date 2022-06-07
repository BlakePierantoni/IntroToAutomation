resource "aws_instance" "onPremDB" {
  count = 1
  ami           = "${var.ami}"
  instance_type = "${var.instance_type}"
  subnet_id = "${var.public_subnet_id}"
  vpc_security_group_ids = ["${var.onPremDBSG}"]
  private_ip = "10.0.0.24"

  
  root_block_device {
      volume_type = "${var.volume_type}"
      volume_size = "${var.volume_size}"
    }

  tags = {
    Name = "HappyCarsDB"
    Project = "${var.projectTag}"
    Department = "${var.departmentTag}"
    Environment = "${var.environmentTag}"
  }
}
