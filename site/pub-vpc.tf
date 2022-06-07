#
#VPC and IG
#
resource "aws_vpc" "onPremVPC" {
  cidr_block       = "${var.vpc_cidr}"
  instance_tenancy = "default"
  enable_dns_hostnames = "true"

  tags = {
    Name = "HappyCarsOnPremVPC"
    Project = "${var.projectTag}"
    Department = "${var.departmentTag}"
    Environment = "${var.environmentTag}"
  }
}

resource "aws_internet_gateway" "onPremIG" {
  vpc_id = aws_vpc.onPremVPC.id

  tags = {
    Name = "internet-gw"
    Project = "${var.projectTag}"
    Department = "${var.departmentTag}"
    Environment = "${var.environmentTag}"
  }
}

output "vpc_id" {
  value = "${aws_vpc.onPremVPC.id}"
}
#
#Subnet
#
resource "aws_subnet" "onPremPublicSN" {
  vpc_id     = aws_vpc.onPremVPC.id
  cidr_block = "10.0.0.0/24"
  map_public_ip_on_launch = "true"
  availability_zone = "us-east-1a"

  tags = {
    Name = "onPremPublicSN"
    Project = "${var.projectTag}"
    Department = "${var.departmentTag}"
    Environment = "${var.environmentTag}"
  }
}

output "public_subnet_id" {
  value = "${aws_subnet.onPremPublicSN.id}"
}
#
#Route Table
#
resource "aws_route_table" "onPremPublicRT" {
  vpc_id = aws_vpc.onPremVPC.id
  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.onPremIG.id
  }

  tags = {
    Name = "onPremPublicRT"
    Project = "${var.projectTag}"
    Department = "${var.departmentTag}"
    Environment = "${var.environmentTag}"
  }
}

resource "aws_route_table_association" "onPremPublicRTA" {
  subnet_id      = aws_subnet.onPremPublicSN.id
  route_table_id = aws_route_table.onPremPublicRT.id
}
