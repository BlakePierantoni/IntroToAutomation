resource "aws_security_group" "onPremDBSG" {
  vpc_id      = aws_vpc.onPremVPC.id
  name        = "onPremDBSG"
  description = "allow access from onPremWebSG to DB"
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
    from_port   = 3306
    to_port     = 3306
    protocol    = "tcp"
    security_groups = ["${aws_security_group.onPremWebSG.id}"]  #No Var, can see resouces nodes of other resouces in same module
  }
  
  tags = {
    Name = "onPremDBSG"
  }
}
output "onPremDBSG" {
  value = "${aws_security_group.onPremDBSG.id}"
}

