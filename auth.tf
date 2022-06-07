terraform {
  cloud {
    organization = "SHI-Cloud"

    workspaces {
      name = "IntroToAutomation"
    }
  }
}

provider "aws" {
  region     = "us-east-1"
}

credentials "app.terraform.io" {
  token = ""
}
