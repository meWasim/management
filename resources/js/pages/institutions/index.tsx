import { Head, Link } from "@inertiajs/react";

import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";

import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { create } from "@/routes/institutions";

interface Domain {
  id: number;
  domain: string;
}

interface Institution {
  id: string;
  name: string;
  domains: Domain[];
}

interface Props {
  institutions: Institution[];
}

export default function Index({ institutions }: Props) {
  return (
    <>
      <Head title="Institutions" />

      <div className="container mx-auto py-8">
        <div className="mb-6 flex items-center justify-between">
          <div>
            <h1 className="text-3xl font-bold">Institutions</h1>
            <p className="text-muted-foreground">
              Manage your tenant institutions.
            </p>
          </div>

          <Button asChild>
            <Link href={create()}>
              Create Institution
            </Link>
          </Button>
        </div>

        <Card>
          <CardHeader>
            <CardTitle>Institution List</CardTitle>
          </CardHeader>

          <CardContent>
            <Table>
              <TableHeader>
                <TableRow>
                  <TableHead>Name</TableHead>
                  <TableHead>Domain</TableHead>
                  <TableHead className="w-[120px]">Actions</TableHead>
                </TableRow>
              </TableHeader>

              <TableBody>
                {institutions.length > 0 ? (
                  institutions.map((institution) => (
                    <TableRow key={institution.id}>
                      <TableCell>{institution.name}</TableCell>

                     <TableCell>
                        {institution.domains?.[0]?.domain}
                      </TableCell>

                      <TableCell>
                        <Button variant="outline" size="sm">
                          View
                        </Button>
                      </TableCell>
                    </TableRow>
                  ))
                ) : (
                  <TableRow>
                    <TableCell
                      colSpan={3}
                      className="text-center text-muted-foreground"
                    >
                      No institutions found.
                    </TableCell>
                  </TableRow>
                )}
              </TableBody>
            </Table>
          </CardContent>
        </Card>
      </div>
    </>
  );
}
