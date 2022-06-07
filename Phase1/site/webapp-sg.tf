resource "aws_security_group" "onPremWebSG" {
  vpc_id      = "${aws_vpc.onPremVPC.id}"
  name        = "onPremWebSG"
  description = "Allows SSH and all egress traffic"
  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = {
    Name = "happycars_webapp_sg"
    Project = "${var.projectTag}"
    Department = "${var.departmentTag}"
    Environment = "${var.environmentTag}"
  }
}

output "onPremWebSG" {
  value = "${aws_security_group.onPremWebSG.id}"
}