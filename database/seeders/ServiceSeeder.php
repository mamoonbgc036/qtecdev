<?php
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name'        => 'Web Development',
                'description' => 'Complete web development services including frontend and backend development using modern technologies.',
                'price'       => 1500.00,
                'status'      => true,
            ],
            [
                'name'        => 'Mobile App Development',
                'description' => 'Native and cross-platform mobile application development for iOS and Android.',
                'price'       => 2000.00,
                'status'      => true,
            ],
            [
                'name'        => 'UI/UX Design',
                'description' => 'Professional user interface and user experience design services for web and mobile applications.',
                'price'       => 800.00,
                'status'      => true,
            ],
            [
                'name'        => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing solutions including SEO, social media marketing, and content marketing.',
                'price'       => 1200.00,
                'status'      => true,
            ],
            [
                'name'        => 'Cloud Consulting',
                'description' => 'Expert cloud consulting services for AWS, Azure, and Google Cloud Platform.',
                'price'       => 1800.00,
                'status'      => true,
            ],
            [
                'name'        => 'Legacy System Migration',
                'description' => 'Migration of legacy systems to modern platforms and technologies.',
                'price'       => 2500.00,
                'status'      => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
