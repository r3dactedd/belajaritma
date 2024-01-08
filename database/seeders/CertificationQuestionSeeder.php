<?php

namespace Database\Seeders;

use App\Models\CertifQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'You have 50 virtual machines hosted on-premises and 50 virtual machines hosted in Azure. The on-premises virtual machines and the Azure virtual machines connect to each other.
            Which type of cloud model is this',
            'jawaban_a' => 'Hybrid',
            'jawaban_b' => 'Private',
            'jawaban_c' => 'Public',
            'jawaban_d' => 'Protected',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'A company wants to migrate to the cloud. The requirement is to have a VPN connection to connect your on-premises network to an Azure virtual network over an IPsec/IKE (IKEv1 or IKEv2) VPN tunnel.
            What is the most suitable type of VPN connection that you should use?',
            'jawaban_a' => 'Point-to-Site VPN connection',
            'jawaban_b' => 'Site-to-Site VPN Connection',
            'jawaban_c' => 'VNet peering connection',
            'jawaban_d' => 'ExpressRoute Connection',
            'jawaban_benar' => 'B',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Your company plans to deploy several custom applications to Azure. The applications will provide invoicing services to the customers of the company. Each application will have several prerequisite applications and services installed.
            You need to recommend a cloud deployment solution for all the applications.
            What should you recommend?',
            'jawaban_a' => 'Software as a Service (SaaS)',
            'jawaban_b' => 'Platform as a Service (PaaS)',
            'jawaban_c' => 'Deployment as a Service (DaaS)',
            'jawaban_d' => 'Infrastructure as a Service (laaS)',
            'jawaban_benar' => 'D',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => "Your company plans to migrate all its data and resources to Azure.
            The company's migration plan states that only Platform as a Service (PaaS) solutions must be used in Azure.
            You need to deploy an Azure environment that meets the company's migration plan.
            What should you create?",
            'jawaban_a' => 'Azure virtual machines, Azure SQL databases, and Azure Storage accounts',
            'jawaban_b' => 'an Azure App Service and Azure virtual machines that have Microsoft SQL Server installed',
            'jawaban_c' => 'an Azure App Service and Azure SQL databases',
            'jawaban_d' => 'Azure storage accounts and web server in Azure virtual machines.',
            'jawaban_benar' => 'C',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'What does a customer provide in a software as a service (SaaS) model?',
            'jawaban_a' => 'Application data',
            'jawaban_b' => 'Data storage',
            'jawaban_c' => 'Compute resources',
            'jawaban_d' => 'Application software',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Which of the following are considered vertical scaling in a cloud environment?',
            'jawaban_a' => 'Increase the number of virtual machines',
            'jawaban_b' => 'Provision additional containers',
            'jawaban_c' => 'Increase the CPU and RAM of a virtual machine',
            'jawaban_d' => 'Provision an additional Azure dedicated host',
            'jawaban_benar' => 'C',
        ]);

        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'A company is planning on using Azure for hosting their application resources. Which of the following types of expenses would the company need to primarily incorporate in their costing plan for Azure based resources?',
            'jawaban_a' => 'Capital Expenditure',
            'jawaban_b' => 'Data Center Expenditure',
            'jawaban_c' => 'Operational Expenditure',
            'jawaban_d' => 'Electricity Costs',
            'jawaban_benar' => 'C',
        ]);

        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Your developers have created 10 web applications that must be host on Azure.
            You need to determine which Azure web tier plan to host the web apps. The web tier plan must meet the following requirements:
            - The web apps will use custom domains.
            - The web apps each require 10 GB of storage.
            - The web apps must each run in dedicated compute instances.
            - Load balancing between instances must be included.
            - Costs must be minimized.
            Which web tier plan should you use?',
            'jawaban_a' => 'Standard',
            'jawaban_b' => 'Basic',
            'jawaban_c' => 'Free',
            'jawaban_d' => 'Shared',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'You have an on-premises network that contains several servers.
            You plan to migrate all the servers to Azure.
            You need to recommend a solution to ensure that some of the servers are available if a single Azure data center goes offline for an extended period.
            What should you include in the recommendation?',
            'jawaban_a' => 'Fault tolerance',
            'jawaban_b' => 'Elasticity',
            'jawaban_c' => 'Scalability',
            'jawaban_d' => 'Low latency',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Which service enables cloud architects and central information technology groups to define a repeatable set of Azure resources that implements and adheres to an organization’s standards, patterns, and requirements?',
            'jawaban_a' => 'Azure Blueprints',
            'jawaban_b' => 'Compliance Manager',
            'jawaban_c' => 'Azure Monitor',
            'jawaban_d' => 'Protected',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Your company has virtual machines (VMs) hosted in Microsoft Azure. The VMs are located in a single Azure virtual network named VNet1.
            The company has users that work remotely. The remote workers require access to the VMs on VNet1.
            You need to provide access for the remote workers.
            What should you do?',
            'jawaban_a' => 'Configure a Site-to-Site (S2S) VPN.',
            'jawaban_b' => ' Configure a Point-to-Site (P2S) VPN.',
            'jawaban_c' => 'Configure DirectAccess on a Windows Server 2012 server VM.',
            'jawaban_d' => 'Configure a Multi-Site VPN',
            'jawaban_benar' => 'B',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'What service enables you to correlate trace events from multiple Azure VMs and other resources into a centralized repository?',
            'jawaban_a' => 'Azure Event Hubs',
            'jawaban_b' => 'Azure Repos',
            'jawaban_c' => 'Azure Monitor',
            'jawaban_d' => 'Azure Resource Manager',
            'jawaban_benar' => 'C',
        ]);


        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'You plan to migrate several servers from an on-premises network to Azure.
            What is an advantage of using a public cloud service for the servers over an on-premises network?',
            'jawaban_a' => 'The public cloud is owned by the public, NOT a private corporation',
            'jawaban_b' => 'The public cloud is a crowd-sourcing solution that provides corporations with the ability to enhance the cloud',
            'jawaban_c' => 'All public cloud resources can be freely accessed by every member of the public',
            'jawaban_d' => 'The public cloud is a shared entity whereby multiple corporations each use a portion of the resources in the cloud',
            'jawaban_benar' => 'D',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => '
            Your company has data centers in Los Angeles and New York. The company has a Microsoft Azure subscription.
            You are configuring the two datacenters as geo-clustered sites for site resiliency.
            You need to recommend an Azure storage redundancy option.
            You have the following data storage requirements:
            ✑ Data must be stored on multiple nodes.
            ✑ Data must be stored on nodes in separate geographic locations.
            ✑ Data can be read from the secondary location as well as from the primary location
            Which of the following Azure stored redundancy options should you recommend?',
            'jawaban_a' => 'Geo-redundant storage',
            'jawaban_b' => 'Read-only geo-redundant storage',
            'jawaban_c' => 'Zone-redundant storage',
            'jawaban_d' => 'Locally redundant storage',
            'jawaban_benar' => 'B',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'What can you use to launch the Azure Cloud Shell?',
            'jawaban_a' => 'Azure portal',
            'jawaban_b' => 'Azure PowerShell',
            'jawaban_c' => 'Azure Command Line Interface (CLI)',
            'jawaban_d' => 'Azure Resource Manager (ARM) template',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Which defense in depth layer uses distributed denial of service (DDoS) protection?',
            'jawaban_a' => 'Physical security layer',
            'jawaban_b' => 'Application layer',
            'jawaban_c' => 'Network layer',
            'jawaban_d' => 'Perimeter layer',
            'jawaban_benar' => 'D',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'Within the context of privacy and compliance, what does the acronym ISO stand for, in English?',
            'jawaban_a' => 'Intelligence and Security Office',
            'jawaban_b' => 'Information Systems Officer',
            'jawaban_c' => 'International Organization for Standardization',
            'jawaban_d' => 'Instead of',
            'jawaban_benar' => 'C',
        ]);


        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'How many minutes per month of downtime is 99.99% availability?',
            'jawaban_a' => '44 minutes',
            'jawaban_b' => '4 minutes',
            'jawaban_c' => '2 minute',
            'jawaban_d' => '1 minutes',
            'jawaban_benar' => 'B',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'You plan to provision Infrastructure as a Service (IaaS) resources in Azure.
            Which resource is an example of IaaS?',
            'jawaban_a' => 'an Azure web app',
            'jawaban_b' => 'an Azure virtual machine',
            'jawaban_c' => 'an Azure logic app',
            'jawaban_d' => 'an Azure SQL database',
            'jawaban_benar' => 'B',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'To which cloud models can you deploy physical servers?',
            'jawaban_a' => 'private cloud and hybrid cloud only',
            'jawaban_b' => 'private cloud only',
            'jawaban_c' => 'private cloud, hybrid cloud and public cloud',
            'jawaban_d' => 'hybrid cloud only',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'What does a customer provide in a software as a service (SaaS) model?',
            'jawaban_a' => 'Application data',
            'jawaban_b' => 'Data storage',
            'jawaban_c' => 'Compute resources',
            'jawaban_d' => 'Application software',
            'jawaban_benar' => 'A',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'What is the first stage in the Microsoft Cloud Adoption Framework for Azure?',
            'jawaban_a' => 'Adopt the cloud.',
            'jawaban_b' => 'Make a plan.',
            'jawaban_c' => 'Ready your organization.',
            'jawaban_d' => 'Define your strategy.',
            'jawaban_benar' => 'D',
        ]);


        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'What is a feature of an Azure virtual network?',
            'jawaban_a' => 'Resource cost analysis',
            'jawaban_b' => 'Packet inspection',
            'jawaban_c' => 'Geo-redundancy',
            'jawaban_d' => 'Isolation and segmentation',
            'jawaban_benar' => 'D',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'You need to identify the type of failure for which an Azure Availability Zone can be used to protect access to Azure services.
            What should you identify?',
            'jawaban_a' => ' a physical server failure',
            'jawaban_b' => 'an Azure region failure',
            'jawaban_c' => 'a storage failure',
            'jawaban_d' => 'an Azure data center failure',
            'jawaban_benar' => 'D',
        ]);
        CertifQuestions::create([
            'certification_id' => 1,
            'questions' => 'You have an Azure environment that contains multiple Azure virtual machines.
            You plan to implement a solution that enables the client computers on your on-premises network to communicate to the Azure virtual machines.
            You need to recommend which Azure resources must be created for the planned solution.
            Which Azure resources should you include in the recommendation?',
            'jawaban_a' => 'a virtual network gateway',
            'jawaban_b' => 'a load balancer',
            'jawaban_c' => 'an application gateway',
            'jawaban_d' => 'a virtual network',
            'jawaban_benar' => 'A',
        ]);

    }
}
