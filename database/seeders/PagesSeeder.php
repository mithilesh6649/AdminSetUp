<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	*/
	public function run() {
		DB::table('pages')->truncate();
		DB::table('pages')->insert([
			[
				'title' => 'Privacy Policy',
				'section'=>'privacy_policy',
				'content' => "<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>",
				'slug' => 'privacy_policy',
				'device_type' => 'mobile',
				'added_by_id'=>1,
				'updated_by_id'=>1,

			],
			[
				'title' => 'Terms & Conditions',
				'section'=>'terms_and_conditions',
				'content' => "<p>Mauris non tincidunt purus, vel hendrerit nunc. Vivamus ligula ex, fermentum ac tempor in, pellentesque eu lorem. Vivamus et rutrum velit. Ut diam tortor, tempus ac maximus sed, imperdiet porttitor leo. Proin tempor libero at massa aliquet finibus. Aliquam tincidunt dictum elit. Vestibulum blandit leo nibh, ac consequat ipsum posuere sodales. In nec orci eget felis blandit sodales id id sapien. Curabitur ut feugiat odio. Suspendisse condimentum dignissim nunc, sed venenatis ante viverra et. Nullam commodo urna mauris, sed cursus ante dictum auctor. Vivamus dapibus molestie sapien. Maecenas suscipit vitae orci eu consequat. Donec sodales porttitor neque, non auctor dui tristique ut. Donec ut nulla est. Donec dui quam, condimentum id mauris a, ultrices rutrum risus.
				In sagittis gravida ipsum id aliquet. Curabitur dapibus in orci condimentum mollis. Nam in nibh magna. Nulla finibus massa ante, sed porta massa pellentesque quis. Pellentesque lacinia venenatis mauris, ut hendrerit velit eleifend in. Aenean nec pretium nulla, in laoreet lacus. Ut bibendum ultrices lectus, vel iaculis odio varius vel. Fusce laoreet at erat sit amet tincidunt. Aliquam tempor semper placerat. Aliquam tortor tortor, efficitur sed dui vel, dictum faucibus odio. Fusce laoreet tortor nec pulvinar faucibus. Donec faucibus tellus vel ex maximus egestas. Nam finibus erat lectus, eu iaculis ipsum mattis vitae. Donec vehicula auctor est ut faucibus. Etiam sit amet auctor nulla.
				Donec vitae massa commodo, ornare eros ut, convallis eros. Aliquam pellentesque ac turpis id interdum. Mauris pulvinar augue nec felis facilisis, non ullamcorper quam auctor. Quisque iaculis tempus placerat. Quisque mauris dui, convallis ac erat ut, accumsan efficitur dolor. Donec sed ipsum quis mauris commodo laoreet eu id lacus. Vivamus facilisis rhoncus tellus a vehicula. Mauris enim arcu, eleifend accumsan ex sit amet, convallis iaculis sem. In blandit ultrices lacus, id vulputate erat aliquet ut. Aliquam quis luctus nulla. Aliquam vehicula dolor sed lacinia elementum. Fusce vel dolor eget eros varius molestie. Nunc volutpat viverra interdum.</p>",
				'slug' => 'terms_and_conditions',
				'device_type' => 'mobile',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],
			[
				'title' => 'About Us',
				'section'=>'about_us',
				'content' => "<p>The multilateral and bilateral system comprising international organizations and charities has long been an untouched industry from a technology point of view. Our ambition is to energize the international development mechanism by transforming data into actionable insights to enhance the resilience of the global food system. A world where food is produced in a smart, productive, and sustainable way can advance both mitigation and adaptation goals and effectively address climate change induced losses and damages.</p>

				<p><br />
				Loss and Damage is an initiative of The Climate Panel that is focused on providing communities acutely affected by climate change with a digital tool to enable them to hold decision makers accountability for their investments in climate smart technologies and management systems in the domains of water-energy-food. Data generated via the Loss &amp; Damage climate application will support the creation of a registry of climate change induced losses and damages. In addition, data archived via the application will serve as a resource that supports the creation of a loss and damage registry. The registry can be used as part of online training offered via the climate panel<br />
				(https://www.theclimatepanel.com).</p>
				",
				'slug' => 'about_us',
				'device_type' => 'mobile',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],


			[
				'title' => 'How it Works',
				'section'=>'home',
				'content' => "<p>How it Works<br />
				Besides populating a map of the world with regions experiencing varying levels of climate change stress,<br />
				Loss &amp;amp; Damage has a core purpose which is to highlight regions where institutional capacity<br />
				requirements are acute. Here is how it works:<br />
				1. A coordinator commits to organizing an expert panel around a topic of climate change induced<br />
				losses and damages: A maximum of 25 members and a minimum of 5 members participate in a<br />
				panel.<br />
				2. An online administrator ensures that the coordinator has complied with the registration<br />
				requirements 1 .<br />
				3. All panel members take a 30-question quiz to offer their viewpoint on regional losses and<br />
				damages arising from climate change.<br />
				4. The application will synthesize views of the expert panel to generate a weighted average region<br />
				and country score.<br />
				5. The application visualizes the scores to generate a map of the levels of climate change loss and<br />
				damage stress for a given region and country.</p>",
				'slug' => 'how_it_works',
				'device_type' => 'mobile',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],

			[
				'title' => 'Loss & Damage',
				'section'=>'home',
				'content' => "<p>Loss &amp;amp; Damage</p>

				<p>Climate Assessments Considering Political Economy</p>
				
				<p>Loss &amp;amp; Damage is a diagnostic tool that visualizes regions with acute climate change induced tradeoffs of<br />
				economic development and environmental management. Supervised data entry and machine- driven<br />
				analytics can enable the tracing of regions most in need of improved institutional capacity to effectively<br />
				prepare for and respond to climate events such as droughts, heat waves, floods and fires that have the</p>
				
				<p>potential to threaten the resilience of global food systems.</p>",
				'slug' => 'loss_and_damage',
				'device_type' => 'mobile',
				'added_by_id'=>1,
				'updated_by_id'=>1,

			],

			//Web
			[
				'title' => 'Privacy Policy',
				'section'=>'privacy_policy',
				'content' => "<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>",
				'slug' => 'privacy_policy',
				'device_type' => 'web',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],
			[
				'title' => 'Terms & Conditions',
				'section'=>'terms_and_conditions',
				'content' => "<p>Mauris non tincidunt purus, vel hendrerit nunc. Vivamus ligula ex, fermentum ac tempor in, pellentesque eu lorem. Vivamus et rutrum velit. Ut diam tortor, tempus ac maximus sed, imperdiet porttitor leo. Proin tempor libero at massa aliquet finibus. Aliquam tincidunt dictum elit. Vestibulum blandit leo nibh, ac consequat ipsum posuere sodales. In nec orci eget felis blandit sodales id id sapien. Curabitur ut feugiat odio. Suspendisse condimentum dignissim nunc, sed venenatis ante viverra et. Nullam commodo urna mauris, sed cursus ante dictum auctor. Vivamus dapibus molestie sapien. Maecenas suscipit vitae orci eu consequat. Donec sodales porttitor neque, non auctor dui tristique ut. Donec ut nulla est. Donec dui quam, condimentum id mauris a, ultrices rutrum risus.
				In sagittis gravida ipsum id aliquet. Curabitur dapibus in orci condimentum mollis. Nam in nibh magna. Nulla finibus massa ante, sed porta massa pellentesque quis. Pellentesque lacinia venenatis mauris, ut hendrerit velit eleifend in. Aenean nec pretium nulla, in laoreet lacus. Ut bibendum ultrices lectus, vel iaculis odio varius vel. Fusce laoreet at erat sit amet tincidunt. Aliquam tempor semper placerat. Aliquam tortor tortor, efficitur sed dui vel, dictum faucibus odio. Fusce laoreet tortor nec pulvinar faucibus. Donec faucibus tellus vel ex maximus egestas. Nam finibus erat lectus, eu iaculis ipsum mattis vitae. Donec vehicula auctor est ut faucibus. Etiam sit amet auctor nulla.
				Donec vitae massa commodo, ornare eros ut, convallis eros. Aliquam pellentesque ac turpis id interdum. Mauris pulvinar augue nec felis facilisis, non ullamcorper quam auctor. Quisque iaculis tempus placerat. Quisque mauris dui, convallis ac erat ut, accumsan efficitur dolor. Donec sed ipsum quis mauris commodo laoreet eu id lacus. Vivamus facilisis rhoncus tellus a vehicula. Mauris enim arcu, eleifend accumsan ex sit amet, convallis iaculis sem. In blandit ultrices lacus, id vulputate erat aliquet ut. Aliquam quis luctus nulla. Aliquam vehicula dolor sed lacinia elementum. Fusce vel dolor eget eros varius molestie. Nunc volutpat viverra interdum.</p>",
				'slug' => 'terms_and_conditions',
				'device_type' => 'web',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],
			[
				'title' => 'About Us',
				'section'=>'about_us',
				'content' => "<p>The multilateral and bilateral system comprising international organizations and charities has long been an untouched industry from a technology point of view. Our ambition is to energize the international development mechanism by transforming data into actionable insights to enhance the resilience of the global food system. A world where food is produced in a smart, productive, and sustainable way can advance both mitigation and adaptation goals and effectively address climate change induced losses and damages.</p>

				<p><br />
				Loss and Damage is an initiative of The Climate Panel that is focused on providing communities acutely affected by climate change with a digital tool to enable them to hold decision makers accountability for their investments in climate smart technologies and management systems in the domains of water-energy-food. Data generated via the Loss &amp; Damage climate application will support the creation of a registry of climate change induced losses and damages. In addition, data archived via the application will serve as a resource that supports the creation of a loss and damage registry. The registry can be used as part of online training offered via the climate panel<br />
				(https://www.theclimatepanel.com).</p>
				",
				'slug' => 'about_us',
				'device_type' => 'web',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],

			[
				'title' => 'How it Works',
				'section'=>'home',
				'content' => "<p>How it Works<br />
				Besides populating a map of the world with regions experiencing varying levels of climate change stress,<br />
				Loss &amp;amp; Damage has a core purpose which is to highlight regions where institutional capacity<br />
				requirements are acute. Here is how it works:<br />
				1. A coordinator commits to organizing an expert panel around a topic of climate change induced<br />
				losses and damages: A maximum of 25 members and a minimum of 5 members participate in a<br />
				panel.<br />
				2. An online administrator ensures that the coordinator has complied with the registration<br />
				requirements 1 .<br />
				3. All panel members take a 30-question quiz to offer their viewpoint on regional losses and<br />
				damages arising from climate change.<br />
				4. The application will synthesize views of the expert panel to generate a weighted average region<br />
				and country score.<br />
				5. The application visualizes the scores to generate a map of the levels of climate change loss and<br />
				damage stress for a given region and country.</p>",
				'slug' => 'how_it_works',
				'device_type' => 'web',
				'added_by_id'=>1,
				'updated_by_id'=>1,
			],
			[
				'title' => 'Loss & Damage',
				'section'=>'home',
				'content' => "<p>Loss &amp;amp; Damage</p>

				<p>Climate Assessments Considering Political Economy</p>
				
				<p>Loss &amp;amp; Damage is a diagnostic tool that visualizes regions with acute climate change induced tradeoffs of<br />
				economic development and environmental management. Supervised data entry and machine- driven<br />
				analytics can enable the tracing of regions most in need of improved institutional capacity to effectively<br />
				prepare for and respond to climate events such as droughts, heat waves, floods and fires that have the</p>
				
				<p>potential to threaten the resilience of global food systems.</p>",
				'slug' => 'loss_and_damage',
				'device_type' => 'web',
				'added_by_id'=>1,
				'updated_by_id'=>1,

			],

		]);
	}
}
