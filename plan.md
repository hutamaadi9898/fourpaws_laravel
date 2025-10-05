# Pet Memorial Website Generator - Complete Development Plan

## Project Overview

A Laravel-based pet memorial website generator that allows users to create beautiful, personalized memorial pages for their beloved pets. The application features a modern landing page with two main sections: product promotion and showcase gallery, built using Laravel 12, Livewire Volt, Filament 4, Flux UI, Alpine.js, and Tailwind CSS 4.

## Technology Stack

-   **Backend**: Laravel 12.32.5, PHP 8.4.11
-   **Database**: PostgreSQL 17
-   **Frontend**: Livewire 3.6.4 (Standard Components), Alpine.js
-   **UI Components**: Filament 4.1.1 (Admin Panel), Flux UI 2.5.0, Tailwind CSS 4.1.11
-   **Authentication**: Laravel Breeze (User Auth) + Filament Admin Panel
-   **Testing**: Pest 4.1.1 with Browser Testing
-   **Code Quality**: Laravel Pint 1.25.1
-   **SEO**: Modern semantic HTML, meta tags, structured data, sitemap generation
-   **Design**: Inter font family, custom Four Paws logo SVG, Unsplash/Pexels stock images, dark-optimized color palette (slate/zinc), modern UI patterns

---

## Phase 1: Foundation Setup & Authentication (Week 1-2) ✅ COMPLETED

### 1.1 Database Design & Migrations ✅ COMPLETED

-   [✅] **Database Schema Planning**

    -   [✅] Design user authentication tables (provided by Laravel Breeze)
    -   [✅] Create pet memorial pages table structure
    -   [✅] Design media storage schema for photos/videos
    -   [✅] Plan template and customization options schema
    -   [N/A] Create subscription/billing schema (if premium features)
    -   [Later] Plan SEO-related tables (meta tags, sitemaps, etc.)

-   [✅] **Core Migrations**
    -   [✅] `create_memorial_templates_table` migration
        -   [✅] Fields: id, name, description, preview_image, template_data (JSONB), is_active, sort_order, created_at, updated_at
    -   [✅] `create_memorial_pages_table` migration
        -   [✅] Fields: id, user_id, pet_name, pet_type, breed, birth_date, death_date, slug, template_id, custom_settings (JSONB), description, is_published, view_count, created_at, updated_at
    -   [✅] `create_memorial_media_table` migration
        -   [✅] Fields: id, memorial_page_id, media_type, file_path, original_filename, mime_type, file_size, alt_text, sort_order, created_at, updated_at
    -   [✅] `create_memorial_stories_table` migration
        -   [✅] Fields: id, memorial_page_id, title, content, author_name, sort_order, created_at, updated_at
    -   [✅] `create_guestbook_entries_table` migration
        -   [✅] Fields: id, memorial_page_id, visitor_name, visitor_email, message, is_approved, created_at, updated_at
    -   [✅] Run migrations and verify PostgreSQL compatibility

### 1.2 Laravel Breeze Authentication Setup ✅ COMPLETED

-   [✅] **Laravel Breeze Installation & Configuration**

    -   [✅] Install Laravel Breeze with Livewire stack: `php artisan breeze:install livewire`
    -   [✅] Configure registration, login, password reset, and email verification
    -   [Phase 2] Customize Breeze views using Flux UI components and modern design
    -   [Phase 2] Set up dark mode support and modern typography (Inter font)
    -   [✅] Test authentication flow thoroughly with responsive design

-   [✅] **User Model Enhancement**
    -   [✅] Add profile fields (name, email_verified_at, etc.)
    -   [✅] Set up relationships with memorial pages
    -   [✅] Configure model factories for testing
    -   [✅] Create user seeder for development

### 1.3 Core Models & Relationships ✅ COMPLETED

-   [✅] **Memorial Page Model**

    -   [✅] Define fillable fields and casts
    -   [✅] Set up relationships (user, media, stories, template)
    -   [✅] Add slug generation and URL helpers
    -   [✅] Implement factory and seeder
    -   [✅] Add model scopes (published, by_user, etc.)

-   [✅] **Memorial Media Model**

    -   [✅] Configure file storage relationships
    -   [Phase 2] Set up image optimization and resizing
    -   [✅] Add media type validation
    -   [✅] Implement factory for testing

-   [✅] **Memorial Template Model**

    -   [✅] Define template structure and settings
    -   [✅] Set up JSON casting for template_data
    -   [✅] Create default templates (5 professional templates)
    -   [Phase 2] Add template preview functionality

-   [✅] **Memorial Story Model**

    -   [✅] Set up content management
    -   [Phase 2] Add rich text support
    -   [✅] Configure relationships and validation

-   [✅] **Guestbook Entry Model**
    -   [✅] Set up visitor condolence system
    -   [✅] Add approval workflow
    -   [✅] Configure relationships and validation

### 1.4 File Storage & Media Management

-   [Phase 2] **Storage Configuration**

    -   [Phase 2] Configure local and cloud storage (AWS S3/Digital Ocean Spaces)
    -   [Phase 2] Set up image optimization pipeline
    -   [Phase 2] Configure file upload validation and security
    -   [Phase 2] Test file upload and retrieval

-   [Phase 2] **Media Processing**
    -   [Phase 2] Set up image resizing and optimization
    -   [Phase 2] Configure thumbnail generation
    -   [Phase 2] Implement file type validation
    -   [Phase 2] Add virus scanning if needed

### 1.5 Database Seeded with Sample Data ✅ COMPLETED

-   [✅] **Memorial Template Seeder**

    -   [✅] Classic Memorial (traditional with Georgia font)
    -   [✅] Modern Tribute (contemporary with gradients)
    -   [✅] Gentle Farewell (warm colors, comforting)
    -   [✅] Rainbow Bridge (hopeful, colorful theme)
    -   [✅] Simple & Serene (minimalist design)

-   [✅] **Sample Memorial Pages** (8 pages created)

    -   [✅] Complete with pet information, stories, media, and guestbook entries
    -   [✅] Published and ready for display
    -   [✅] Realistic test data for development

-   [✅] **Development Data**
    -   [✅] Test users with proper authentication
    -   [✅] Sample media files with proper metadata
    -   [✅] Heartfelt memorial stories
    -   [✅] Approved guestbook entries with condolences

---

## Phase 2: Landing Page Development ✅ COMPLETED

### 2.1 Landing Page Structure

-   [✅] **Route Configuration**

    -   [✅] Set up main landing page route (`/`)
    -   [✅] Configure tab-based navigation (Promote/Gallery)
    -   [✅] Add SEO-friendly URLs and meta tags

-   [✅] **Standard Livewire Components**
    -   [✅] Create main landing page Livewire component (LandingPage)
    -   [✅] Implement tab switching functionality using Alpine.js (3 tabs: Create Memorial, Templates, Featured Memorials)
    -   [✅] Add smooth transitions and animations with stock images from Unsplash
    -   [✅] Ensure mobile responsiveness with Tailwind CSS
    -   [✅] Custom Four Paws logo SVG integrated across all pages

### 2.2 Hero Section & Product Promotion Tab

-   [✅] **Hero Section Design**

    -   [✅] Create compelling headline and subheading
    -   [✅] Add gradient hero background with modern design
    -   [✅] Implement call-to-action buttons
    -   [✅] Add value proposition messaging

-   [✅] **Features Section**

    -   [✅] List key product features with icons
    -   [✅] Add feature descriptions and benefits
    -   [✅] Include statistics and social proof
    -   [✅] Create templates showcase section

-   [✅] **Call-to-Action Components**
    -   [✅] "Create Memorial" primary CTA
    -   [✅] "Browse Gallery" secondary CTA
    -   [✅] Register/Login links
    -   [✅] Social proof elements (memorial count, user stats)

### 2.3 Gallery/Showcase Tab

-   [✅] **Memorial Gallery Display**

    -   [✅] Create grid layout for memorial showcases
    -   [✅] Implement featured memorials display
    -   [✅] Add template gallery with previews
    -   [✅] Include memorial preview cards with pet information

-   [✅] **Gallery Interactions**
    -   [✅] Tab switching between promote/gallery
    -   [✅] Template preview cards
    -   [✅] Featured memorial highlights
    -   [ ] User rating/feedback system

### 2.4 Modern UI, SEO & Performance

-   [ ] **Modern Design System Implementation**

    -   [ ] Use Tailwind CSS 4 with modern syntax and features
    -   [ ] Implement Inter font family for modern typography
    -   [ ] Create dark-optimized color palette (slate/zinc based)
    -   [ ] Implement sophisticated dark/light mode toggle
    -   [ ] Ensure mobile-first responsive design with touch-friendly interactions
    -   [ ] Add smooth micro-interactions and animations

-   [ ] **SEO Optimization**

    -   [ ] Implement semantic HTML5 structure
    -   [ ] Add comprehensive meta tags (Open Graph, Twitter Cards)
    -   [ ] Create structured data (JSON-LD) for memorial pages
    -   [ ] Implement breadcrumb navigation
    -   [ ] Add XML sitemap generation
    -   [ ] Configure robots.txt and meta robots

-   [ ] **Performance Optimization**
    -   [ ] Implement lazy loading for images with modern techniques
    -   [ ] Optimize Livewire component loading and state management
    -   [ ] Add advanced caching strategies (Redis, CDN)
    -   [ ] Minimize bundle size with tree shaking
    -   [ ] Implement Critical CSS for above-the-fold content

---

## Phase 3: Memorial Page Builder (Week 5-7)

### 3.1 Template System

-   [ ] **Template Architecture**

    -   [ ] Design flexible template system
    -   [ ] Create JSON-based template configuration
    -   [ ] Implement template inheritance
    -   [ ] Add template customization options

-   [ ] **Default Templates**
    -   [ ] Create 5-10 beautiful default templates
    -   [ ] Include various styles (modern, classic, nature, etc.)
    -   [ ] Design mobile-responsive templates
    -   [ ] Add template preview functionality

### 3.2 Memorial Page Builder Interface

-   [ ] **User-Facing Builder (Standard Livewire)**

    -   [ ] Create intuitive memorial builder with step-by-step wizard using standard Livewire components
    -   [ ] Build real-time preview functionality using Alpine.js
    -   [ ] Implement drag-and-drop components with modern interactions
    -   [ ] Add template selection with live preview
    -   [ ] Create mobile-responsive builder interface

-   [✅] **Filament Admin Panel Integration**

    -   [✅] Create Memorial Page resource for admin management
    -   [✅] Build comprehensive admin interface for content moderation
    -   [✅] Add bulk actions and advanced filtering
    -   [✅] Implement admin dashboard with analytics

-   [ ] **Builder Components**
    -   [ ] Pet information form (name, dates, breed, etc.)
    -   [ ] Photo/video upload with modern file handling
    -   [ ] Rich text story/memory editor with formatting
    -   [ ] Modern color and typography customization
    -   [ ] Background and layout options with preview

### 3.3 Content Management

-   [ ] **Rich Text Editor**

    -   [ ] Integrate TinyMCE or similar editor
    -   [ ] Add formatting options
    -   [ ] Include image insertion capability
    -   [ ] Support for lists, quotes, and styling

-   [ ] **Media Management**
    -   [ ] Multiple photo upload with drag-and-drop
    -   [ ] Photo cropping and editing tools
    -   [ ] Gallery arrangement interface
    -   [ ] Video embedding support

### 3.4 Customization Options

-   [ ] **Visual Customization**

    -   [ ] Color scheme selector
    -   [ ] Typography options
    -   [ ] Layout variations
    -   [ ] Custom CSS support (advanced users)

-   [ ] **Content Customization**
    -   [ ] Section visibility toggles
    -   [ ] Custom field additions
    -   [ ] Memorial sharing options
    -   [ ] Guestbook/condolence feature

---

## Phase 4: Memorial Page Display & User Experience (Week 8-9)

### 4.1 Public Memorial Pages

-   [ ] **Dynamic Page Generation**

    -   [ ] Create dynamic route handling (`/memorial/{slug}`)
    -   [ ] Implement template rendering system
    -   [ ] Add SEO optimization (meta tags, structured data)
    -   [ ] Configure social media sharing

-   [ ] **Memorial Page Features**
    -   [ ] Beautiful photo galleries with lightbox
    -   [ ] Story/memory sections
    -   [ ] Interactive timeline (if applicable)
    -   [ ] Guestbook/condolence system
    -   [ ] Memorial sharing functionality

### 4.2 Interactive Features

-   [ ] **Guestbook System**

    -   [ ] Visitor message submission
    -   [ ] Message moderation (optional)
    -   [ ] Email notifications to memorial owner
    -   [ ] Anti-spam protection

-   [ ] **Social Features**
    -   [ ] Social media sharing buttons
    -   [ ] Memorial page statistics
    -   [ ] QR code generation for easy access
    -   [ ] Print-friendly layouts

### 4.3 Mobile Experience

-   [ ] **Mobile Optimization**
    -   [ ] Touch-friendly navigation
    -   [ ] Optimized image loading
    -   [ ] Responsive layout adjustments
    -   [ ] Fast loading on mobile networks

---

## Phase 5: User Dashboard & Management (Week 10-11)

### 5.1 User Dashboard

-   [ ] **Dashboard Overview**

    -   [ ] Memorial pages overview
    -   [ ] Quick statistics and analytics
    -   [ ] Recent activity feed
    -   [ ] Quick action buttons

-   [ ] **Memorial Management**
    -   [ ] List all user's memorial pages
    -   [ ] Edit/update existing memorials
    -   [ ] Duplicate/clone memorial functionality
    -   [ ] Archive/delete memorial pages

### 5.2 Filament Admin Interface

-   [ ] **Resource Configuration**

    -   [ ] Set up Memorial Page resource with full CRUD
    -   [ ] Create form schemas with validation
    -   [ ] Build comprehensive table views
    -   [ ] Add bulk actions and filters

-   [ ] **User Management**
    -   [ ] User resource with profile management
    -   [ ] Memorial page relationships
    -   [ ] User activity tracking
    -   [ ] Support ticket system (optional)

### 5.3 Analytics & Insights

-   [ ] **Memorial Analytics**

    -   [ ] Page view tracking
    -   [ ] Visitor analytics
    -   [ ] Guestbook activity
    -   [ ] Social sharing metrics

-   [ ] **Dashboard Widgets**
    -   [ ] Memorial performance widgets
    -   [ ] Recent visitor activity
    -   [ ] Popular memorial templates
    -   [ ] User engagement metrics

---

## Phase 6: Advanced Features & Polish (Week 12-14)

### 6.1 Premium Features (Optional)

-   [ ] **Advanced Customization**

    -   [ ] Custom CSS editor
    -   [ ] Advanced typography options
    -   [ ] Premium template library
    -   [ ] White-label options

-   [ ] **Enhanced Media Support**
    -   [ ] Video backgrounds
    -   [ ] Audio memories/music
    -   [ ] 360-degree photo support
    -   [ ] Memorial slideshow generation

### 6.2 SEO & Performance

-   [ ] **Search Engine Optimization**

    -   [ ] Sitemap generation
    -   [ ] Meta tag optimization
    -   [ ] Structured data markup
    -   [ ] Open Graph and Twitter Cards

-   [ ] **Performance Optimization**
    -   [ ] Image lazy loading and optimization
    -   [ ] CDN integration
    -   [ ] Caching strategies (Redis/Memcached)
    -   [ ] Database query optimization

### 6.3 Email & Notifications

-   [ ] **Email System**

    -   [ ] Welcome emails for new users
    -   [ ] Memorial creation confirmations
    -   [ ] Guestbook notification emails
    -   [ ] Memorial anniversary reminders

-   [ ] **Notification System**
    -   [ ] In-app notifications
    -   [ ] Email preferences management
    -   [ ] SMS notifications (optional)
    -   [ ] Push notifications (PWA)

---

## Phase 7: Testing & Quality Assurance (Week 15-16)

### 7.1 Comprehensive Testing Suite

-   [ ] **Unit Tests**

    -   [ ] Model relationship testing
    -   [ ] Validation rule testing
    -   [ ] Helper function testing
    -   [ ] Service class testing

-   [ ] **Feature Tests**

    -   [ ] Authentication flow testing
    -   [ ] Memorial creation process
    -   [ ] File upload functionality
    -   [ ] User dashboard features

-   [ ] **Browser Tests (Pest 4)**
    -   [ ] End-to-end user journeys
    -   [ ] Memorial creation workflow
    -   [ ] Landing page interactions
    -   [ ] Mobile responsiveness testing
    -   [ ] Cross-browser compatibility

### 7.2 Standard Livewire Component Testing

-   [ ] **Component Tests**

    -   [ ] Landing page tab switching (Create Memorial, Templates, Featured Memorials)
    -   [ ] Memorial builder interactions
    -   [ ] Form validation and submission
    -   [ ] Real-time updates and reactivity

-   [ ] **Integration Tests**
    -   [ ] Filament resource operations
    -   [ ] Database transactions
    -   [ ] File storage operations
    -   [ ] Email delivery testing

### 7.3 Performance & Security Testing

-   [ ] **Performance Testing**

    -   [ ] Page load speed testing
    -   [ ] Database query optimization
    -   [ ] Image loading performance
    -   [ ] Mobile performance testing

-   [ ] **Security Testing**
    -   [ ] File upload security
    -   [ ] User input validation
    -   [ ] SQL injection prevention
    -   [ ] XSS protection testing

---

## Phase 8: Deployment & Launch Preparation (Week 17-18)

### 8.1 Production Environment Setup

-   [ ] **Server Configuration**

    -   [ ] Laravel application deployment
    -   [ ] PostgreSQL database setup
    -   [ ] Redis/caching configuration
    -   [ ] SSL certificate installation

-   [ ] **CI/CD Pipeline**
    -   [ ] GitHub Actions workflow
    -   [ ] Automated testing pipeline
    -   [ ] Deployment automation
    -   [ ] Environment variable management

### 8.2 Monitoring & Analytics

-   [ ] **Application Monitoring**

    -   [ ] Error tracking (Sentry/Bugsnag)
    -   [ ] Performance monitoring
    -   [ ] Uptime monitoring
    -   [ ] Database performance tracking

-   [ ] **User Analytics**
    -   [ ] Google Analytics integration
    -   [ ] User behavior tracking
    -   [ ] Conversion funnel analysis
    -   [ ] A/B testing setup

### 8.3 Documentation & Training

-   [ ] **User Documentation**

    -   [ ] Getting started guide
    -   [ ] Memorial creation tutorial
    -   [ ] FAQ section
    -   [ ] Video tutorials

-   [ ] **Technical Documentation**
    -   [ ] API documentation
    -   [ ] Deployment guide
    -   [ ] Maintenance procedures
    -   [ ] Troubleshooting guide

---

## Technical Implementation Details

### Database Schema (PostgreSQL 17)

```sql
-- Users table (handled by Laravel Fortify)
CREATE TABLE users (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    two_factor_secret TEXT NULL,
    two_factor_recovery_codes TEXT NULL,
    two_factor_confirmed_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Memorial pages
CREATE TABLE memorial_pages (
    id BIGSERIAL PRIMARY KEY,
    user_id BIGINT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    pet_name VARCHAR(255) NOT NULL,
    pet_type VARCHAR(100) NOT NULL,
    breed VARCHAR(255) NULL,
    birth_date DATE NULL,
    death_date DATE NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    template_id BIGINT NOT NULL REFERENCES memorial_templates(id),
    custom_settings JSONB NOT NULL DEFAULT '{}',
    description TEXT NULL,
    is_published BOOLEAN NOT NULL DEFAULT false,
    view_count INTEGER NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Memorial templates
CREATE TABLE memorial_templates (
    id BIGSERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    preview_image VARCHAR(500) NULL,
    template_data JSONB NOT NULL DEFAULT '{}',
    is_active BOOLEAN NOT NULL DEFAULT true,
    sort_order INTEGER NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Memorial media
CREATE TABLE memorial_media (
    id BIGSERIAL PRIMARY KEY,
    memorial_page_id BIGINT NOT NULL REFERENCES memorial_pages(id) ON DELETE CASCADE,
    media_type VARCHAR(50) NOT NULL, -- 'image', 'video', 'audio'
    file_path VARCHAR(500) NOT NULL,
    original_filename VARCHAR(255) NOT NULL,
    mime_type VARCHAR(100) NOT NULL,
    file_size INTEGER NOT NULL,
    alt_text VARCHAR(500) NULL,
    sort_order INTEGER NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Memorial stories/memories
CREATE TABLE memorial_stories (
    id BIGSERIAL PRIMARY KEY,
    memorial_page_id BIGINT NOT NULL REFERENCES memorial_pages(id) ON DELETE CASCADE,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_name VARCHAR(255) NULL,
    sort_order INTEGER NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Guestbook entries
CREATE TABLE guestbook_entries (
    id BIGSERIAL PRIMARY KEY,
    memorial_page_id BIGINT NOT NULL REFERENCES memorial_pages(id) ON DELETE CASCADE,
    visitor_name VARCHAR(255) NOT NULL,
    visitor_email VARCHAR(255) NULL,
    message TEXT NOT NULL,
    is_approved BOOLEAN NOT NULL DEFAULT true,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
```

### Key Standard Livewire Components

```php
// app/Livewire/LandingPage.php
<?php

namespace App\Livewire;

use App\Models\MemorialPage;
use App\Models\MemorialTemplate;
use App\Models\User;
use Livewire\Component;

class LandingPage extends Component
{
    public string $activeTab = 'promote';

    public function switchTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        try {
            $featuredMemorials = MemorialPage::published()
                ->with(['user', 'media' => fn($query) => $query->limit(1)])
                ->latest()
                ->limit(6)
                ->get();

            $templates = MemorialTemplate::active()
                ->ordered()
                ->limit(5)
                ->get();

            $stats = [
                'memorials' => MemorialPage::published()->count(),
                'templates' => MemorialTemplate::active()->count(),
                'users' => User::count(),
            ];
        } catch (\Exception $e) {
            // Fallback data if database queries fail
            $featuredMemorials = collect([]);
            $templates = collect([]);
            $stats = [
                'memorials' => 0,
                'templates' => 0,
                'users' => 0,
            ];
        }

        return view('livewire.landing-page', [
            'featuredMemorials' => $featuredMemorials,
            'templates' => $templates,
            'stats' => $stats,
        ])->layout('layouts.none');
    }
}
```

```php
// routes/web.php - Updated routing without Volt
Route::get('/', \App\Livewire\LandingPage::class)->name('home');
```

### Filament Resource Example

```php
// app/Filament/Resources/MemorialPageResource.php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemorialPageResource\Pages;
use App\Models\MemorialPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MemorialPageResource extends Resource
{
    protected static ?string $model = MemorialPage::class;
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Memorial Pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pet Information')
                    ->schema([
                        Forms\Components\TextInput::make('pet_name')
                            ->label('Pet Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('pet_type')
                            ->label('Pet Type')
                            ->options([
                                'dog' => 'Dog',
                                'cat' => 'Cat',
                                'bird' => 'Bird',
                                'rabbit' => 'Rabbit',
                                'fish' => 'Fish',
                                'hamster' => 'Hamster',
                                'other' => 'Other'
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('breed')
                            ->label('Breed')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('birth_date')
                            ->label('Birth Date'),
                        Forms\Components\DatePicker::make('death_date')
                            ->label('Date of Passing'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Memorial Details')
                    ->schema([
                        Forms\Components\Select::make('template_id')
                            ->label('Template')
                            ->relationship('template', 'name')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Memorial Description')
                            ->rows(3),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(false),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\Repeater::make('media')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('file_path')
                                    ->label('Media File')
                                    ->image()
                                    ->required(),
                                Forms\Components\TextInput::make('alt_text')
                                    ->label('Alt Text')
                                    ->maxLength(500),
                            ])
                            ->columns(2)
                            ->defaultItems(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pet_name')
                    ->label('Pet Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pet_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dog' => 'success',
                        'cat' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Owner')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('view_count')
                    ->label('Views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pet_type')
                    ->options([
                        'dog' => 'Dog',
                        'cat' => 'Cat',
                        'bird' => 'Bird',
                        'rabbit' => 'Rabbit',
                        'fish' => 'Fish',
                        'hamster' => 'Hamster',
                        'other' => 'Other'
                    ]),
                Tables\Filters\TernaryFilter::make('is_published'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemorialPages::route('/'),
            'create' => Pages\CreateMemorialPage::route('/create'),
            'edit' => Pages\EditMemorialPage::route('/{record}/edit'),
        ];
    }
}
```

### Testing Strategy

```php
// tests/Feature/MemorialPageTest.php
<?php

use App\Models\User;
use App\Models\MemorialPage;
use App\Models\MemorialTemplate;

describe('Memorial Page Management', function () {
    it('allows authenticated users to create memorial pages', function () {
        $user = User::factory()->create();
        $template = MemorialTemplate::factory()->create();

        $this->actingAs($user)
            ->post('/memorial-pages', [
                'pet_name' => 'Buddy',
                'pet_type' => 'dog',
                'breed' => 'Golden Retriever',
                'birth_date' => '2020-01-15',
                'death_date' => '2024-10-01',
                'template_id' => $template->id,
                'description' => 'A loving companion who brought joy to our family.',
            ])
            ->assertSuccessful()
            ->assertRedirect();

        expect(MemorialPage::where('pet_name', 'Buddy')->exists())->toBeTrue();
    });

    it('displays memorial pages correctly on public view', function () {
        $memorial = MemorialPage::factory()
            ->published()
            ->create(['pet_name' => 'Luna']);

        $this->get("/memorial/{$memorial->slug}")
            ->assertSuccessful()
            ->assertSee('Luna');
    });
});

// tests/Browser/LandingPageTest.php
<?php

use App\Models\MemorialPage;
use App\Models\User;

describe('Landing Page Browser Tests', function () {
    it('allows users to switch between tabs', function () {
        visit('/')
            ->assertSee('Create Memorial')
            ->assertSee('Memorial Gallery')
            ->click('Memorial Gallery')
            ->waitForText('Featured Memorials')
            ->assertSee('Featured Memorials');
    });

    it('displays featured memorials in gallery tab', function () {
        $memorials = MemorialPage::factory()
            ->published()
            ->count(3)
            ->create();

        visit('/')
            ->click('Memorial Gallery')
            ->waitForText('Featured Memorials');

        foreach ($memorials as $memorial) {
            $page->assertSee($memorial->pet_name);
        }
    });

    it('allows users to create account from landing page', function () {
        visit('/')
            ->click('Get Started')
            ->assertPathIs('/register')
            ->type('name', 'John Doe')
            ->type('email', 'john@example.com')
            ->type('password', 'password123')
            ->type('password_confirmation', 'password123')
            ->press('Register')
            ->assertAuthenticatedAs(User::where('email', 'john@example.com')->first());
    });
});
```

## Success Metrics & KPIs

### User Engagement

-   [ ] User registration rate
-   [ ] Memorial creation completion rate
-   [ ] Time spent on memorial pages
-   [ ] Return visitor percentage
-   [ ] Social sharing frequency

### Technical Performance

-   [ ] Page load times < 3 seconds
-   [ ] Mobile responsiveness score > 95%
-   [ ] SEO score > 90%
-   [ ] Uptime > 99.9%
-   [ ] Zero critical security vulnerabilities

### Business Metrics

-   [ ] User acquisition cost
-   [ ] User lifetime value
-   [ ] Conversion rate from visitor to creator
-   [ ] Customer satisfaction score
-   [ ] Premium feature adoption (if applicable)

---

## Risk Mitigation

### Technical Risks

-   [ ] **Database Performance**: Implement proper indexing and query optimization
-   [ ] **File Storage Limits**: Plan for scalable cloud storage solutions
-   [ ] **Security Vulnerabilities**: Regular security audits and updates
-   [ ] **Browser Compatibility**: Comprehensive cross-browser testing

### Business Risks

-   [ ] **User Adoption**: A/B testing and user feedback loops
-   [ ] **Competition**: Unique features and superior user experience
-   [ ] **Scalability**: Cloud-native architecture and performance monitoring
-   [ ] **Data Privacy**: GDPR compliance and transparent privacy policies

---

## Post-Launch Roadmap

### Phase 9: User Feedback & Iteration (Week 19-20)

-   [ ] User feedback collection and analysis
-   [ ] Performance optimization based on real usage
-   [ ] Bug fixes and stability improvements
-   [ ] Feature refinements based on user behavior

### Phase 10: Advanced Features (Week 21-24)

-   [ ] Mobile app development (PWA/native)
-   [ ] Advanced memorial customization options
-   [ ] Integration with funeral homes/veterinarians
-   [ ] Memorial sharing and collaboration features
-   [ ] Anniversary reminders and memorial updates

This comprehensive plan provides a detailed roadmap for building a modern, feature-rich pet memorial website generator using the latest Laravel ecosystem technologies. Each phase builds upon the previous one, ensuring a solid foundation while gradually adding complexity and advanced features.
